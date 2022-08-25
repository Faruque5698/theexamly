<?php use App\Models\Backend\Course;?>
@foreach($students as $key=>$row)
    <tr>
        <td>{{ ++$key }}</td>
        <td>@if($row->student_id!='null'){{ $row->student_id }}@endif</td>
        <td>{{ $row->user->name ?? '' }}</td>
        <td>{{ $row->user->phone ?? '-' }}</td>
        <td>{{ $row->user->email ?? '-' }}</td>
        <?php 
            $subjectName = DB::table('subject_user')->select('subject_id')->distinct()->where('user_id',$row->user->id)->where('status',1)->get()->toArray();
            $data= json_decode( json_encode($subjectName), true);
            $string= implode(',', array_column($data, 'subject_id'));
            $arry= preg_split("/[,]/",$string);
            
        ?>
        <td>
            @foreach($arry as $subjects)
                <?php 
                    $name = DB::table('subjects')->where('id',$subjects)->get()->pluck('name')->first();
                    $group_name = DB::table('subjects')->where('id',$subjects)->get()->pluck('group_id')->first();
                    $course = Course::where('id',$group_name)->get()->pluck('full_name')->first();?>
                {{ $name ?? '-' }} - {{ $course }} <br>
            @endforeach
        </td>

        @permission('view_student' , 'edit_student' , 'delete_student')

            <td style="width: 10%">
                <div class="dropdown">
                    <a class=" dropdown-toggle dropdown_toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></a>
                    <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuButton">
                        @permission('view_student')
                            <a href="javascript:void(0)" class="dropdown-item view-modal" title="View" data-id={{$row->id }}><i
                                class="fa fa-eye"></i> View</a>

                        @endpermission

                        @permission('edit_student')
                            <div class="dropdown-divider"></div>
                            <a href="{{ route("admin.students.edit", $row)}}" class="dropdown-item" title="Edit" role="button">
                            <i class="fa fa-edit"></i> Edit</a>
                        @endpermission


                        @permission('delete_student')
                            <div class="dropdown-divider"></div>
                            @csrf
                            <a href="javascript:void(0)" class="dropdown-item delete" title="delete" data-id={{$row->id}}><i
                                    class="fa fa-trash"></i> Delete</a>
                        @endpermission        
                    </div>
                </div>
            </td>
        @endpermission
    </tr>
@endforeach
<tr>
    <td colspan="6">
        {!! $students->links() !!}
    </td>
</tr>