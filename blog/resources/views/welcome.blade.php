@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h1><u>All Of Your Tasks</u></h1></center>
                     <a href="/create_post">
                         <button type="button" class="btn btn-primary" style="float:right; margin-top:0px;">Create</button><br><br>
                      </a>
                </div>
                <div class="panel-body">
                <table class="table">
                  <tr>
                     <th>Tasks</th>
                     <th>Id</th>
                     <th></th>
                     <th></th>
                    </tr>
                      <?php
                     foreach ($tasks as $task) {
                      echo"<tr><td>$task->task</td><td>$task->id</td><td><a href='/edit/$task->id'><button style='float:right;' class='btn btn-primary'>Edit</button></a></td><td><a href='/delete/$task->id'><input type='button' style='float:right;' class='btn btn-danger' value='Delete'></a></td></tr>";
                    }
         
                    ?>
                    </table>
                </div>
            </div>
            {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection
