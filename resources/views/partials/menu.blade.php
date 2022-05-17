<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('car_section_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/car-types*") ? "c-show" : "" }} {{ request()->is("admin/makers*") ? "c-show" : "" }} {{ request()->is("admin/car-models*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-car c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.carSection.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('car_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.car-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/car-types") || request()->is("admin/car-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('maker_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.makers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/makers") || request()->is("admin/makers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-industry c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.maker.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('car_model_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.car-models.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/car-models") || request()->is("admin/car-models/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carModel.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('tire_section_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/tire-features*") ? "c-show" : "" }} {{ request()->is("admin/tire-designs*") ? "c-show" : "" }} {{ request()->is("admin/tire-sizes*") ? "c-show" : "" }} {{ request()->is("admin/tires*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-dot-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.tireSection.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('tire_feature_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tire-features.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tire-features") || request()->is("admin/tire-features/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-award c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tireFeature.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tire_design_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tire-designs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tire-designs") || request()->is("admin/tire-designs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-crop c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tireDesign.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tire_size_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tire-sizes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tire-sizes") || request()->is("admin/tire-sizes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-text-width c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tireSize.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tire_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tires.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tires") || request()->is("admin/tires/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dot-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tire.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('article_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.articles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/articles") || request()->is("admin/articles/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.article.title') }}
                </a>
            </li>
        @endcan
        @can('distributor_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/cities*") ? "c-show" : "" }} {{ request()->is("admin/locations*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.distributor.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('city_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe-americas c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.city.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('location_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/locations") || request()->is("admin/locations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.location.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('customer_service_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/contacts*") ? "c-show" : "" }} {{ request()->is("admin/newss*") ? "c-show" : "" }} {{ request()->is("admin/contact-types*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.customerService.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('contact_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-envelope-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contact.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('news_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.newss.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/newss") || request()->is("admin/newss/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.news.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contact_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contact-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contact-types") || request()->is("admin/contact-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contactType.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('site_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/site-languages*") ? "c-show" : "" }} {{ request()->is("admin/settings*") ? "c-show" : "" }} {{ request()->is("admin/site-translations*") ? "c-show" : "" }} {{ request()->is("admin/import-datas*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.siteSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('site_language_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.site-languages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/site-languages") || request()->is("admin/site-languages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.siteLanguage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('site_translation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.site-translations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/site-translations") || request()->is("admin/site-translations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-language c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.siteTranslation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('import_data_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.import-datas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/import-datas") || request()->is("admin/import-datas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-upload c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.importData.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>