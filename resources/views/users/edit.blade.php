@extends('main')

@section('title','|تعديل')
@section('stylesheets')
{!! Html::style('css/bootstrap-datepicker.css') !!} 
@endsection

@section('content')
<div class="row"> 
	<!-- to array here !--> 
	 
	 <div class="col-md-7">
	 	{!! Form::model($user, ['route'=>['users.update',$user->id] ,'method' => 'PUT', 'files' => 'ture','class'=>'dates']) !!}

	 	{{form::label('name', 'الاسم رباعي :')}}
		{{ form::text('name', null , ["class"=>'form-control input-lg' ]) }}

		{{form::label('dept_id', 'القسم:')}}
		<select class="form-control" name="dept_id">
			@foreach($depts as $dept)
             <option value='{{ $dept->id}}'{{$dept->id == $user->dept_id ? 'selected' : '' }}> {{ $dept->name}}</option>
        	@endforeach
        </select>
        {{form::label('job_id', 'الوظيفة:')}}
		<select class="form-control" name="job_id">
			@foreach($jobs as $job)
             <option value='{{ $job->id}}'{{$job->id == $user->job_id ? 'selected' : '' }}> {{ $job->name}}</option>
        	@endforeach
        </select>
         {{form::label('degree_id', 'الدرجة الوظيفية:')}}
		<select class="form-control" name="degree_id">
			@foreach($degrees as $degree)
             <option value='{{ $degree->id}}'{{$degree->id == $user->degree_id ? 'selected' : '' }}> {{ $degree->name}}</option>
        	@endforeach
        </select>

		{{form::label('user_type', 'نوع المستخدم :')}}
					<select class="form-control" name="user_type" >
						<option value='user'{{ $user->user_type == 'user' ? 'selected' : ''}}> مستخدم </option> 
						<option value='emp'{{ $user->user_type == 'emp' ? 'selected' : ''}}> موظف </option> 	
                         <option value='trainee'{{ $user->user_type == 'trainee' ? 'selected' : ''}}> متدرب </option>                   
                    </select>  
		{{form::label('email', 'البريد الالكتروني :')}} 
		{{ form::text('email', null,["class"=>'form-control' ]) }}


        {{form::label('gender', 'النوع :')}}
		<select class="form-control" name="gender">
         <option value='ذكر'{{ $user->gender == 'ذكر' ? 'selected' : ''}}> ذكر </option>   
         <option value='انثى'{{ $user->gender == 'انثى' ? 'selected' : ''}}> انثى </option> 	
         </select>
          {{form::label('state', 'الولاية :')}}
         <select class="form-control" name="state">
         <option value='الخرطوم'> الخرطوم </option>  
         <option value='بحري'> بحري </option>  
         <option value='ام درمان'> ام درمان </option>    	
         </select>

		{{form::label('city', 'المدينة :',['class'=>'form-spacing-top' ])}}
         <select class="form-control" name="city">
         <option value='الخرطوم'> الخرطوم </option>
         <option value='بحري'> بحري </option>  
         <option value='ام درمان'> ام درمان </option>      	
         </select>
		{{form::label('unit', 'الوحدة الاداريه :')}} 
		<select class="form-control" name="unit">
         <option value='الخرطوم'> الخرطوم </option>
         <option value='بحري'> بحري </option>  
         <option value='ام درمان'> ام درمان </option>    	
         </select>

        {{form::label('home_no', 'رقم المنزل :')}}
		{{ form::text('home_no', null, ["class"=>'form-control' ]) }}

		{{form::label('تاريخ الميلاد', 'رقم الهاتف:',['class'=>'form-spacing-top' ])}}
		{{ form::text('Bdate', null, ["class"=>'form-control',"id"=>'u1' ]) }}

        {{form::label('qualification', 'المؤهل العلمي :')}}
			<select class="form-control" name="qualification">
                  <option value='دكتوراة'>دكتوراة </option>
                  <option value='ماجستير'>ماجستير </option>
                  <option value='دبلوم عالي'>دبلوم عالي </option>
                  <option value='دبلوم'> دبلوم </option> 
                  <option value='شهادة سودانية'> شهادة سودانية </option>
                  <option value='بدون'> بدون </option>         	
            </select>

		{{form::label('اثبات الشخصية', 'رقم الهاتف:',['class'=>'form-spacing-top' ])}}
		{{ form::text('snb', null, ["class"=>'form-control' ]) }}

		{{form::label('snb_type', 'اثبات الشخصية:')}}
			<select class="form-control" name="snb_type">
                 <option value='جواز'> جواز </option>
                 <option value='رقم وطني'> رقم وطني </option> 
                 <option value='رخصة'> رخصة </option>        	
            </select>

		{{form::label('phone', 'رقم الهاتف:',['class'=>'form-spacing-top' ])}}
		{{ form::text('phone', null, ["class"=>'form-control' ]) }}

		{{form::label('phone2', 'رقم الهاتف:',['class'=>'form-spacing-top' ])}}
		{{ form::text('phone2', null, ["class"=>'form-control' ]) }}
 
		{{form::label('images', 'تحديث صورة الموظف:'),['class'=>'form-spacing-top' ] }}
		{{form::file('images') }}
		
	</div>
	<div class="col-md-5">
		<div class="well">
			<dl class="dl-horizontal">
			<dt> Create at: </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($user->created_at)) }} </dd>
			</dl>

			<dl class="dl-horizontal">
			<dt> update at </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($user->updated_at)) }} </dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					 {{ Html::linkRoute('users.show','الغاء',array($user->id),array('class'=>'btn btn-danger btn-block')) }}
                   
				</div>
				<div class="col-sm-6">
                      {{ Form::submit('حفظ', ['class'=>'btn btn-success btn-block'] )}}
				</div><!-- end form !-->
                 
			</div>
		</div>
	</div>

{!! Form::close() !!}
</div> <!-- end the form !-->

@endsection
@section('scripts')

{!! Html::script('js/bootstrap-datepicker.js') !!}

<script type="text/javascript">
 

  $(function() {
            $('.dates #u1').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'multidate': true
            });

        });
</script>

 @endsection

