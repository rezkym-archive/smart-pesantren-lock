<?php
namespace Traits\Student;

use App\Models\MutabaahAchievement;

/**
 * ActionMutabaahAchievement
 */
trait ActionMutabaahAchievement
{
    protected function MutabaahAchievementAvaibleThisMonth()
    {
        /* $isAvaible = MutabaahAchievement::where('student_id', $this->student->id)
        ->whereDate('created') */
    }
}
