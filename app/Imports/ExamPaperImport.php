<?php

namespace App\Imports;

use App\Models\ExamPaper;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExamPaperImport implements ToCollection, WithHeadingRow, WithChunkReading, WithBatchInserts
{
  public function startRow(): int
  {
    return 2;
  }

  public function collection(Collection $rows)
  {
    $rowsInserted = 0;
    $totalRows = 0;

    foreach ($rows as $row) {
      $where = [
        'exam_year' => $row['exam_year'],
        'col1' => $row['col1'],
        'col1' => $row['col1'],
        'col1' => $row['col1'],
        'col1' => $row['col1'],
      ];
      $data = ExamPaper::where($where)->count();

      if ($data == 0) {
        ExamPaper::create([
          'col1' => $row['col1'],
        ]);
        $rowsInserted++;
      }

      $totalRows++;
    }

    if ($rowsInserted > 0) {
      session()->flash('smsg', "$rowsInserted out of $totalRows rows imported successfully.");
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
