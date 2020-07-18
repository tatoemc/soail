@extends('main')

@section('title','| انشاء رسالة')

@section('stylesheets')
{!! Html::style('css/bootstrap-datepicker.css') !!} 
@endsection

@section('content')

<div class="row"> 
	
		<div class="col-md-8 col-md-offset-2">
			        {!! Form::open(['route' => 'users.store', 'data-parsley-validate' => '', 'files' => 'ture','class'=>'dates' ]) !!}

					{{form::label('')}}
					{{form::text('name',null,array('class' => 'form-control','required' => '','placeholder'=>'الاسم' )) }}

					{{form::label('dept_id', 'القسم:')}}
					<select class="form-control" name="dept_id">
						@foreach($depts as $dept)
                         <option value='{{ $dept->id}}'> {{ $dept->name}}</option>
                    	@endforeach
                    </select>
                    {{form::label('job_id', 'الوظيفة:')}}
					<select class="form-control" name="job_id">
						@foreach($jobs as $job)
                         <option value='{{ $job->id}}'> {{ $job->name}}</option>
                    	@endforeach
                    </select>
                     {{form::label('degree_id', 'الدرجة الوظيفية:')}}
					<select class="form-control" name="degree_id">
						@foreach($degrees as $degree)
                         <option value='{{ $degree->id}}'> {{ $degree->name}}</option>
                    	@endforeach
                    </select>

					{{form::label('user_type', 'نوع المستخدم :')}} 
					<select class="form-control" name="user_type">
						<option value='user'> مستخدم </option> 
                        <option value='trainee'> متدرب </option>                   
                    </select>  
 
					{{form::label(' ')}}
					{{form::text('email',null,array('class' => 'form-control','required' => '','placeholder'=>'البريد الالكتروني' )) }}

					{{form::label('')}}
					{{form::text('password',null,array('class' => 'form-control','required' => '','placeholder'=>'كلمة المرور' )) }}

					
					{{form::label('gender', 'النوع :')}}
					<select class="form-control" name="gender">
                          <option value='ذكر'> انثى </option>
                          <option value='ذكر'> ذكر </option>        	
                    </select>
                    {{form::label('state', 'الولاية:')}}
					
                     <select class="form-control" name="state">
                         <option value='الخرطوم'> الخرطوم </option>
                         <option value='امدرمان'> امدرمان </option> 
                         <option value='بحري'> بحري </option>        	
                    </select> 
					{{form::label('city', 'المدينة:')}}
					<select class="form-control" name="city">
                         <option value='الخرطوم'> الخرطوم </option>
                         <option value='امدرمان'> امدرمان </option> 
                         <option value='بحري'> بحري </option>        	
                    </select>

					{{form::label('unit', 'المحلية:')}}
					<select class="form-control" name="unit">
                         <option value='الخرطوم'> الخرطوم </option>
                         <option value='امدرمان'> امدرمان </option> 
                         <option value='بحري'> بحري </option>        	
                    </select>

					{{form::label('')}}
					{{form::text('home_no',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم المنزل' )) }}

					{{form::label('')}}
					{{form::text('Bdate',null,array('class' => 'form-control','required' => '','id'=>'u1','placeholder'=>'تاريخ الميلاد' )) }}

					{{form::label('qualification', 'المؤهل العلمي :')}}
						<select class="form-control" name="qualification">
			                  <option value='دكتوراة'>دكتوراة </option>
			                  <option value='ماجستير'>ماجستير </option>
			                  <option value='دبلوم عالي'>دبلوم عالي </option>
			                  <option value='دبلوم'> دبلوم </option> 
			                  <option value='شهادة سودانية'> شهادة سودانية </option>
			                  <option value='بدون'> بدون </option>         	
			            </select>

					{{form::label('qualification', 'النوع :')}}
					<select class="form-control" name="qualification">
                          <option value='دكتوراة'>دكتوراة </option>
                          <option value='ماجستير'>ماجستير </option>
                          <option value='دبلوم عالي'>دبلوم عالي </option>
                          <option value='دبلوم'> دبلوم </option> 
                          <option value='شهادة سودانية'> شهادة سودانية </option>
                          <option value='بدون'> بدون </option>         	
                    </select>

					{{form::label('snb_type', 'اثبات الشخصية:')}}
					<select class="form-control" name="snb_type">
                         <option value='جواز'> جواز </option>
                         <option value='رقم وطني'> رقم وطني </option> 
                         <option value='رخصة'> رخصة </option>        	
                    </select>
                    {{form::label('')}}
					{{form::text('snb',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم الاثبات' )) }}

					{{form::label('')}}
					{{form::text('phone',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم الهاتف' )) }}

					{{form::label('')}}
					{{form::text('phone2',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم الهاتف' )) }}
					
                    {{form::label('images', 'صورة الموظف:')}}
					{{form::file('images') }}



					{{form::submit('انشاء مستخدم',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

					{!! Form::close() !!}
		</div>
</div>

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
