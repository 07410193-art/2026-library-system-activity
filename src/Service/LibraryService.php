<?php
declare(strict_types=1);
namespace App\Service;

use DateTime;

class LibraryService{
    public static function calculateOverduefine(DateTime $dueDate, float $dailyRate): float{
        $today = new DateTime();
        $different = $today->diff($dueDate);
        $daysOverdue = (int) $different->format('%r%a');

        return $daysOverdue > 0 ? $daysOverdue * $dailyRate : 0.0;
    }
}

?>