<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function complete($completed = true)
    {
        $this->update(compact('completed'));
        //where is this being called
    }

    public function incomplete()
    {

      $this->complete(false);

    }

    public function project()
    {
      return $this->belongsTo(Project::class);
    }

    // public function store(Task $task)
    // {
    //   $task->complete();
    //
    //   return back();
    // }
    //
    // public function destroy(Task $task)
    // {
    //   $task->incomplete();
    //
    //   return back();
    // }


}
