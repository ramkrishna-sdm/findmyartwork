<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
            {{ __('ArtViaYou') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'buyers' || $elementActive == 'gallery' || $elementActive == 'artists' || $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ $elementActive == 'buyers' || $elementActive == 'gallery' || $elementActive == 'artists' || $elementActive == 'user' || $elementActive == 'profile' ? 'true' : 'false' }}" href="#laravelExamples" class="{{ $elementActive == 'buyers' || $elementActive == 'gallery' || || $elementActive == 'artists' || $elementActive == 'user' || $elementActive == 'profile' ? 'collapsed' : '' }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>
                            {{ __('User Management') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $elementActive == 'buyers' || $elementActive == 'gallery' || $elementActive == 'artists' || $elementActive == 'user' || $elementActive == 'profile' ? 'show' : '' }}" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                <span class="sidebar-normal">{{ __(' Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'buyers' ? 'active' : '' }}">
                            <a href="{{ url('buyer') }}">
                                <span class="sidebar-mini-icon">{{ __('BM') }}</span>
                                <span class="sidebar-normal">{{ __(' Buyer Management ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'artists' ? 'active' : '' }}">
                            <a href="{{ url('artist') }}">
                                <span class="sidebar-mini-icon">{{ __('AM') }}</span>
                                <span class="sidebar-normal">{{ __(' Artist Management ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'gallery' ? 'active' : '' }}">
                            <a href="{{ url('gallery') }}">
                                <span class="sidebar-mini-icon">{{ __('GU') }}</span>
                                <span class="sidebar-normal">{{ __(' Gallery User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'categories' ? 'active' : '' }}">
                <a href="{{ url('category') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Category Management') }}</p>
                </a>
            </li>
              <li class="{{ $elementActive == 'subcategories' ? 'active' : '' }}">
                <a href="{{ url('subcategory') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('SubCategory Management') }}</p>
                </a>
            </li>
             <li class="{{ $elementActive == 'subjects' ? 'active' : '' }}">
                <a href="{{ url('subject') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Subject Management') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'styles' : '' }}">
                <a href="{{ url('style') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Style Management') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>