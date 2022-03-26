<?php
$checkNotify = \Modules\Core\Models\NotificationPush::query();
if(is_admin()){
    $checkNotify->where(function($query){
        $query->where('data', 'LIKE', '%"for_admin":1%');
        $query->orWhere('notifiable_id', Auth::id());
    });
}else{
    $checkNotify->where('data', 'LIKE', '%"for_admin":0%');
    $checkNotify->where('notifiable_id', Auth::id());
}
$notifications = $checkNotify->orderBy('created_at', 'desc')->limit(5)->get();
$countUnread = $checkNotify->where('read_at', null)->count();
?>
<div class="bravo_topbar u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom @if(!empty($is_home)|| !empty($header_transparent))border-color-white @else  border-color-8 @endif">
   <div class="{{$container_class ?? 'container'}}">
       <div class="d-flex align-items-center">
           <div class="list-inline u-header__topbar-nav-divider mb-0 topbar_left_text font-size-14 @if(!empty($is_home)|| !empty($header_transparent)) @else  list-inline-dark @endif">
               {!! setting_item_with_lang("topbar_left_text") !!}
           </div>
           <div class="ml-auto d-flex align-items-center">
               <div class="d-flex align-items-center text-white px-3">
                   <i class="flaticon-phone-call mr-2 ml-1 font-size-18"></i>
                   <span class="d-inline-block font-size-14 mr-1">{{ setting_item("phone_contact") }}</span>
               </div>
               @include('Core::frontend.currency-switcher')
               @include('Language::frontend.switcher')
               <div class="dropdown-notifications position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                <span class="d-inline-block font-size-14 mr-1 dropdown-nav-link" data-toggle="dropdown">
                    <i class="flaticon-bell mr-2 ml-1 font-size-18"></i>
                    <span class="d-inline-block badge badge-danger notification-icon">{{$countUnread}}</span>
                </span>
                   <ul class="dropdown-menu text-left dropdown overflow-auto notify-items dropdown-large">
                       <div class="dropdown-toolbar">
                           <h3 class="dropdown-toolbar-title">{{__('Notifications')}} (<span class="notif-count">{{$countUnread}}</span>)</h3>
                           <div class="dropdown-toolbar-actions">
                               <a href="#" class="markAllAsRead">{{__('Mark all as read')}}</a>
                           </div>
                       </div>
                       <ul class="dropdown-list-items p-0">
                           @if(count($notifications)> 0)
                               @foreach($notifications as $oneNotification)
                                   @php
                                       $active = $class = '';
                                       $data = json_decode($oneNotification['data']);

                                       $idNotification = @$data->id;
                                       $forAdmin = @$data->for_admin;
                                       $usingData = @$data->notification;

                                       $services = @$usingData->type;
                                       $idServices = @$usingData->id;
                                       $title = @$usingData->message;
                                       $name = @$usingData->name;
                                       $avatar = @$usingData->avatar;
                                       $link = @$usingData->link;

                                       if(empty($oneNotification->read_at)){
                                           $class = 'markAsRead';
                                           $active = 'active';
                                       }
                                   @endphp
                                   <li class="notification {{$active}}">
                                       <div class="media">
                                           <div class="media-left">
                                               <div class="media-object">
                                                   @if($avatar)
                                                       <img class="image-responsive" src="{{$avatar}}" alt="{{$name}}">
                                                   @else
                                                       <span class="avatar-text">{{ucfirst($name[0])}}</span>
                                                   @endif
                                               </div>
                                           </div>
                                           <div class="media-body">
                                               <a class="{{$class}} p-0" data-id="{{$idNotification}}" href="{{$link}}">{!! $title !!}</a>
                                               <div class="notification-meta">
                                                   <small class="timestamp">{{format_interval($oneNotification->created_at)}}</small>
                                               </div>
                                           </div>
                                       </div>
                                   </li>
                               @endforeach
                           @endif
                       </ul>
                       <div class="dropdown-footer text-right">
                           <a href="{{route('core.notification.loadNotify')}}">{{__('View More')}}</a>
                       </div>
                   </ul>
               </div>
               <div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                   @if(!Auth::id())
                       <a href="javascript:;" class="d-flex align-items-center text-white py-3"
                          data-toggle="modal" data-target="#login">
                           <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                           <span class="d-inline-block font-size-14 mr-1">{{ __("Sign in or Register") }}</span>
                       </a>
                   @else
                       <div class="d-flex align-items-center text-white py-3 dropdown">
                           <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                           <span class="d-inline-block font-size-14 mr-1 dropdown-nav-link" data-toggle="dropdown">
                            {{__("Hi, :name",['name'=>Auth::user()->getDisplayName()])}}
                        </span>

                           <ul class="dropdown-menu dropdown-menu-user text-left dropdown">
                               @if(empty( setting_item('wallet_module_disable') ))
                                   <li class="credit_amount">
                                       <a href="{{route('user.wallet')}}"><i class="fa fa-money"></i> {{__("Credit: :amount",['amount'=>auth()->user()->balance])}}</a>
                                   </li>
                               @endif
                               @if(is_vendor())
                                   <li class=""><a href="{{route('vendor.dashboard')}}" class=""><i class="icon ion-md-analytics"></i> {{__("Vendor Dashboard")}}</a></li>
                               @endif
                               <li class="@if(is_vendor())  @endif">
                                   <a href="{{route('user.profile.index')}}"><i class="icon ion-md-construct"></i> {{__("My profile")}}</a>
                               </li>
                               @if(setting_item('inbox_enable'))
                                   <li class=""><a href="{{route('user.chat')}}"><i class="fa fa-comments"></i> {{__("Messages")}}</a></li>
                               @endif
                               <li class=""><a href="{{route('user.booking_history')}}"><i class="fa fa-clock-o"></i> {{__("Booking History")}}</a></li>
                               <li class=""><a href="{{route('user.change_password')}}"><i class="fa fa-lock"></i> {{__("Change password")}}</a></li>
                               @if(is_admin())
                                   <li class=""><a href="{{url('/admin')}}"><i class="icon ion-ios-ribbon"></i> {{__("Admin Dashboard")}}</a></li>
                               @endif
                               <li class="">
                                   <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"><i class="fa fa-sign-out"></i> {{__('Logout')}}</a>
                               </li>
                           </ul>
                           <form id="logout-form-topbar" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                       </div>
                   @endif
               </div>

           </div>
       </div>
   </div>
</div>
