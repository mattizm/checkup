<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class UsersExport extends DefaultValueBinder implements FromView, WithCustomValueBinder
{
  private $users;

  function __construct($users)
  {
    $this->users = $users;
  }
  public function view(): View
  {
    $users = $this->users;
    return view('data.export', compact('users'));
  }

  //Change type number to string
  public function bindValue(Cell $cell, $value)
  {
    if (is_numeric($value)) {
      $cell->setValueExplicit($value, DataType::TYPE_STRING);
      return true;
    }
    // else return default behavior
    return parent::bindValue($cell, $value);
  }
}
