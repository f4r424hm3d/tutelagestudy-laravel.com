<?php

namespace App\Imports;

use App\Models\UniversityProgram;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UniversityProgramImport implements ToCollection, WithHeadingRow, WithChunkReading, WithBatchInserts
{
  /**
   * @param Collection $collection
   */
  // public function __construct(array $data)
  // {
  //   $this->group_id = $data['group_id'];
  //   $this->question_type = $data['question_type'];
  // }
  public function __construct(array $data)
  {
    $this->university_id = $data['university_id'];
  }
  public function startRow(): int
  {
    return 2;
  }
  public function collection(collection $rows)
  {
    $rowsInserted = 0;
    $totalRows = 0;
    foreach ($rows as $row) {
      $where = [
        'university_id' => $this->university_id,
        'course_category_id' => $row['course_category_id'],
        'specialization_id' => $row['specialization_id'],
        'level_id' => $row['level_id'],
        'program_name' => $row['program_name'],
      ];
      $data = UniversityProgram::where($where)->count();
      if ($data == 0) {
        $study_mode = explode(',',$row['study_mode']);
        $study_mode = json_encode($study_mode);
        $course_mode = explode(',',$row['course_mode']);
        $course_mode = json_encode($course_mode);
        UniversityProgram::create([
          'university_id' => $this->university_id,
          'course_category_id' => $row['course_category_id'],
          'specialization_id' => $row['specialization_id'],
          'level_id' => $row['level_id'],
          'program_name' => $row['program_name'],
          'program_slug' => slugify($row['program_name']),
          'duration' => $row['duration'],
          'study_mode' => $study_mode,
          'course_mode' => $course_mode,
          'tution_fees' => $row['tution_fees']??null,
        ]);
        $rowsInserted++;
      }
      $totalRows++;
    }
    if ($rowsInserted > 0) {
      session()->flash('smsg', $rowsInserted . ' out of ' . $totalRows . ' rows imported succesfully.');
    } else {
      session()->flash('emsg', 'Data not imported. Duplicate rows found.');
    }
  }

  public function chunkSize(): int
  {
    return 1000;
  }
  public function batchSize(): int
  {
    return 1000;
  }
}
