@extends('layouts.app')
@section('content')
<div class="panel-body">
  <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $course->name }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
   </div>
@endsection
