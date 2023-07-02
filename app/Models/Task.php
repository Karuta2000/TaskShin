<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'project_id', 'due', 'completed', 'user_id', 'priority', 'color_id)'];


    protected function defaultAttributes()
    {
        $defaultDue = Auth::user()->preferences->setDate == 1 ? Carbon::today()->format('y-m-d') : null;

        return [
            'name' => 'New task',
            'project_id' => null,
            'due' => $defaultDue,
            'user_id' => Auth::id(),
            'priority' => Auth::user()->preferences->priority,
            'color_id' => Auth::user()->preferences->color_id,
        ];
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes = $this->defaultAttributes();
    }

    protected $primaryKey = 'id';

    protected $atributes = [
        'completed' => false
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function getDueDate(){

        if($this->due == null){
            return "No date";
        }
        
        $dueDate = Carbon::parse($this->due);

        if ($dueDate->isToday()) {
            return 'today';
        } elseif ($dueDate->isYesterday()) {
            return 'yesterday';
        } elseif ($dueDate->isTomorrow()) {
            return 'tomorrow';
        } elseif ($dueDate->isPast()) {
            return $dueDate->diffForHumans(Carbon::now(), ['syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW, 'options' => CarbonInterface::JUST_NOW | CarbonInterface::ONE_DAY_WORDS]);
        } else {
            return $dueDate->isoFormat('MMMM D');
        }
    }
}
