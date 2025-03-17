<div class="col-md-3">
    <div class="margin-bottom-20">
        <div class="utf-edit-profile-photo-area"> <img
                src="{{ asset('front_end_assets') }}/asseted/images/photo.png" alt="">
            <div class="utf-change-photo-btn-item">
                <!-- <div class="utf-user-photo-upload"> <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload tooltip top" title="Upload Photo" />
                                                        </div> -->
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="sidebar margin-top-20">
        <div class="user-smt-account-menu-container">
            <ul class="user-account-nav-menu">
                <li><a href="{{ route('profile') }}" @class(['current' => Route::is('profile')])><i
                            class="sl sl-icon-user"></i> My
                        Profile</a>
                </li>
                <!-- <li><a href="#"><i class="sl sl-icon-star"></i> Bookmark Listing</a></li> -->
                <!-- <li><a href="#maani"><i class="sl sl-icon-docs"></i>Product Details</a></li> -->
                <li><a href="{{ route('complain') }}" @class(['current' => Route::is('complain')])><i
                            class="sl sl-icon-action-redo"></i> Complaint
                        Box</a>
                </li>
                <!-- <li><a href="#"><i class="sl sl-icon-lock"></i> Change Password</a></li> -->
                <li><a href="{{route('logout')}}"><i class="sl sl-icon-power"></i> Log Out</a></li>
            </ul>
        </div>
    </div>

</div>