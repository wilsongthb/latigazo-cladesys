<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--  <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />  --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGISTICA</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}} ">

    @if(isset($material))
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.css')}} ">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-material-design/dist/css/ripples.css')}} ">
    <link rel="stylesheet" href="{{asset('/bower_components/roboto-fontface/css/roboto/roboto-fontface.css')}} ">    
    @endif
    
    @if(isset($cosmo))
    <link rel="stylesheet" href="{{asset('css/bootstrap-cosmo.min.css')}} ">
    @endif

    @if(isset($lumen))
    <link rel="stylesheet" href="{{asset('css/bootstrap-lumen.min.css')}} ">
    {{--  <link rel="stylesheet" href="{{asset('css/app.css')}} ">  --}}
    @endif

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<body>
    <div ng-app="logistic" ng-controller="RootController">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Braprinnd and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('') }} ">{{config('app.name')}} </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{$appUrl}} "><i class="fa fa-home"></i> Principal</a></li>
                    @foreach ($categories as $categorie_name => $categorie)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{!!$categorie['icon']!!} {{$categorie['title']}} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @foreach ($categorie['modules'] as $module_name)
                                @if (isset($modules[$module_name]))
                                <li><a href="{{ $appUrl }}/{{$module_name}} ">{{ $modules[$module_name]['title'] }} </a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
                <!-- <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form> -->
                <ul class="nav navbar-nav navbar-right">
                    @if (config('logistic.stages'))
                    <li>
                        <a href="" ng-click="dialogs.showSLSM()"> <span ng-bind="LocationsStages.stage.name"></span></a>
                    </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span ng-bind="Locations.list[Locations.get()].name"></span>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li ng-repeat="l in Locations.list track by l.id" ng-class="{ active: l.id == Locations.get() }" ng-click="Locations.set(l.id)"
                                ng-if="l">
                                <a href="javascript:;"><span ng-bind="l.name"></span> </a>
                            </li>
                            <li>
                                <a class="text-center" href="{{ $appUrl }}/locations">
                                    <strong>Ver Areas</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <!-- <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul> -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div class="container">
            <span ng-show="layout.loading"><i class="fa fa-spinner fa-pulse fa-fw"></i> Cargando</span>
        </div>
        <ng-view></ng-view>
        
        <div class="container">
            
            <div class="row form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    
                    <span ng-show="LocationsStages.stage.id">
                        <span ng-bind="LocationsStages.stage.name"></span> 
                        del 
                        <span ng-bind="LocationsStages.stage.start"></span> 
                        <span ng-show="LocationsStages.stage.end">
                            al 
                            <span ng-bind="LocationsStages.stage.end"></span>
                        </span>
                    </span>
                    {{--  <hr>
                    <a href="" class="btn btn-default" ng-click="dialogs.showSLSM()"><i class="fa fa-bars"></i> Seleccionar Etapa</a>  --}}
                </div>
            </div>
            
        </div>
        @include('logistic.selectStage')
    </div>


    <!-- jQuery -->
    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }} "></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>

    @if(isset($material))
    <script src="{{asset('bower_components/bootstrap-material-design/dist/js/material.js')}} "></script>
    <script src="{{asset('bower_components/bootstrap-material-design/dist/js/ripples.js')}} "></script>    
    @endif

    @include('logistic.app')
</body>

</html>