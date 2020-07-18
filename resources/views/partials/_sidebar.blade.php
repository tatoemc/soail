 
<div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        
                        <li class="nav-item start ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
        
                                <img src="{{ asset('images/' . Auth::user()->images )}}" class="rounded">
                                
                            </a> 
                         </li>   
                        <li class="nav-item start ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
                
                                <span class="title"></span>
                                
                            </a>
                            
                        </li>

                        <li class="nav-item start ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">الرئيسية</span>
                                
                            </a>
                            
                        </li>

                        
                        <li class="nav-item  ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-home"></i>
                                <span class="title">{{Auth::user()->name}}</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                    <a href="/changePassword" class="nav-link ">
                                         <i class="glyphicon glyphicon-cog"></i>
                                        <span class="title">تغير كلمة المرور</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                      @can('isAdmin') 
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">المستخدمين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                 <li class="nav-item  ">
                                    <a href="{{ route('users.create')}}" class="nav-link ">
                                        <span class="title">اضافة مستخدم</span>
                                    </a> 
                                </li>
                                <li class="nav-item  ">
                                     <a href="{{ route('users.index')}}" class="nav-link ">
                                        <span class="title">عرض الجميع</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                     <a href="{{ url('user1') }}" class="nav-link ">
                                        <span class="title">عرض المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ url('emp') }}" class="nav-link ">
                                        <span class="title">عرض الموظفين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ url('trainee') }}" class="nav-link ">
                                        <span class="title">عرض المتدربين</span>
                                    </a>
                                </li>
                        
                        
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-education"></i>
                                <span >الاقسام</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                     <a href="{{ route('depts.create')}}" class="nav-link ">
                                        <span class="title">أضافة قسم</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">

                                     <a href="{{ route('depts.index')}}" class="nav-link ">
                                        <span class="title">عرض الاقسام</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-education"></i>
                                <span >الوظائف</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                     <a href="{{ route('jobs.create')}}" class="nav-link ">
                                        <span class="title">أضافة وظيفة</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">

                                     <a href="{{ route('jobs.index')}}" class="nav-link ">
                                        <span class="title">عرض الوظائف</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-education"></i>
                                <span >الدرجات الوظيفية</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                     <a href="{{ route('degrees.create')}}" class="nav-link ">
                                        <span class="title">أضافة درجة وظيفية</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">

                                     <a href="{{ route('degrees.index')}}" class="nav-link ">
                                        <span class="title">عرض الدرجات الوظيفية</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        @endcan
        


        @can('isUser') 
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">المستخدمين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                 <li class="nav-item  ">
                                    <a href="{{ url('createEmp') }}" class="nav-link ">
                                        <span class="title">اضافة مستخدم</span>
                                    </a> 
                                </li>
                                <li class="nav-item  ">
                                     <a href="{{ url('user') }}" class="nav-link ">
                                        <span class="title">عرض المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ url('emp') }}" class="nav-link ">
                                        <span class="title">عرض الموظفين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ url('trainee') }}" class="nav-link ">
                                        <span class="title">عرض المتدربين</span>
                                    </a>
                                </li>
                        
                        
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-education"></i>
                                <span >الاقسام</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                     <a href="{{ route('depts.create')}}" class="nav-link ">
                                        <span class="title">أضافة قسم</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">

                                     <a href="{{ route('depts.index')}}" class="nav-link ">
                                        <span class="title">عرض الاقسام</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-education"></i>
                                <span >الوظائف</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                     <a href="{{ route('jobs.create')}}" class="nav-link ">
                                        <span class="title">أضافة وظيفة</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">

                                     <a href="{{ route('jobs.index')}}" class="nav-link ">
                                        <span class="title">عرض الوظائف</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-education"></i>
                                <span >الدرجات الوظيفية</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                     <a href="{{ route('degrees.create')}}" class="nav-link ">
                                        <span class="title">أضافة درجة وظيفية</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">

                                     <a href="{{ route('degrees.index')}}" class="nav-link ">
                                        <span class="title">عرض الدرجات الوظيفية</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        @endcan
                        <li class="nav-item  "> 
                            <a href="" class="nav-link ">
                                        <i class="icon-call-end"></i>
                                        <span class="title">الدعم الفنى 249915947105</span>
                                    </a>
                        </li>
                        
                        <li class="nav-item  ">

                            <a href="{{ route('user.logout') }}" class="nav-link ">
                                      
                                        <i class="glyphicon glyphicon-off"></i>
                                        <span class="title">خروج</span>
                            </a>
                            
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>