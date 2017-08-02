<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image"/>
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->full_name }}</p>
                <!-- Status -->
                <a href="#"><i
                            class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}
                </a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.menu.content') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern([
                        'admin/page*',
                        'admin/popup*',
                        'admin/news*',
                        'admin/faq*',
                        'admin/template-messages*',
                    ]), 'menu-open') }}"
                    style="display: none; {{ active_class(Active::checkUriPattern([
                        'admin/page*',
                        'admin/popup*',
                        'admin/news*',
                        'admin/faq*',
                        ]), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/page*')) }}">
                        <a href="{{ route('admin.page.index') }}">
                            <i class="fa fa-list-alt"></i>
                            <span>{{ trans('labels.backend.access.page.management') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/popup*')) }}">
                        <a href="{{ route('admin.popup.edit') }}">
                            <i class="fa fa-file-o"></i>
                            <span>{{ trans('labels.backend.access.popup.management') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/news*')) }}">
                        <a href="{{ route('admin.news.index') }}">
                            <i class="fa fa-rss"></i>
                            <span>{{ trans('labels.backend.access.news.management') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/faq*')) }}">
                        <a href="{{ route('admin.faq.index') }}">
                            <i class="fa fa-question-circle-o"></i>
                            <span>{{ trans('labels.backend.access.faq.management') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/template-messages*')) }}">
                        <a href="{{ route('admin.template-messages.index') }}">
                            <i class="fa fa-envelope"></i>
                            <span>{{ trans('labels.backend.access.templateMessage.management') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/documents*')) }}">
                        <a href="{{ route('admin.documents.index') }}">
                            <i class="fa fa-file"></i>
                            <span>{{ trans('labels.backend.access.documents.management') }}</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-ship"></i>
                    <span>{{ trans('menus.backend.menu.store') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu
                    {{ active_class(Active::checkUriPattern([
                        'admin/category*',
                        'admin/finish-tissue*',
                        'admin/collection*',
                        'admin/zone*',
                        'admin/showroom*',
                        'admin/product*',
                        'admin/sort*',
                    ]), 'menu-open') }}"
                    style="display: none; {{ active_class(Active::checkUriPattern([
                        'admin/category*',
                        'admin/finish-tissue*',
                        'admin/collection*',
                        'admin/zone*',
                        'admin/showroom*',
                        'admin/product*',
                        'admin/sort*',
                        ]), 'display: block;') }}">


                    <li class="{{ active_class(Active::checkUriPattern('admin/category*')) }}">
                        <a href="{{ route('admin.category.index') }}">
                            <i class="fa fa-folder-open-o"></i>
                            <span>{{ trans('labels.backend.access.category.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/finish-tissue*')) }}">
                        <a href="{{ route('admin.finish-tissue.index') }}">
                            <i class="fa fa-flag-o"></i>
                            <span>{{ trans('labels.backend.access.finishtissue.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/collection*')) }}">
                        <a href="{{ route('admin.collection.index') }}">
                            <i class="fa fa-map-o"></i>
                            <span>{{ trans('labels.backend.access.collection.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/zone*')) }}">
                        <a href="{{ route('admin.zone.index') }}">
                            <i class="fa fa-map-signs"></i>
                            <span>{{ trans('labels.backend.access.zone.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/showroom*')) }}">
                        <a href="{{ route('admin.showroom.index') }}">
                            <i class="fa fa-puzzle-piece"></i>
                            <span>{{ trans('labels.backend.access.showroom.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern(['admin/product*','admin/sort*'])) }} treeview">
                        <a href="#">
                            <i class="fa fa-cubes"></i>
                            <span>{{ trans('labels.backend.access.product.management') }}</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu {{ active_class(Active::checkUriPattern([
                                'admin/product*',
                                'admin/sort*',
                            ]), 'menu-open') }}"
                            style="display: none; {{ active_class(Active::checkUriPattern([
                                'admin/product*',
                                'admin/sort*',
                            ]), 'display: block;') }}">

                            <li class="{{ active_class(Active::checkUriPattern('admin/product*')) }}">
                                <a href="{{ route('admin.product.index') }}">
                                    <i class="fa fa-cube"></i>
                                    <span>{{ trans('labels.backend.access.product.management') }}</span>
                                </a>
                            </li>

                            <li class="{{ active_class(Active::checkUriPattern('admin/product/full-data*')) }}">
                                <a href="{{ route('admin.product.fullDataIndex') }}">
                                    <i class="fa fa-cube"></i>
                                    <span>{{ trans('labels.backend.access.product.management_full') }}</span>
                                </a>
                            </li>

                            <li class="{{ active_class(Active::checkUriPattern('admin/sort/categories*')) }}">
                                <a href="{{ route('admin.sort.index', 'categories') }}">
                                    <i class="fa fa-sort-amount-asc"></i>
                                    <span>Сорт. в категории</span>
                                </a>
                            </li>

                            <li class="{{ active_class(Active::checkUriPattern('admin/sort/collections*')) }}">
                                <a href="{{ route('admin.sort.index', 'collections') }}">
                                    <i class="fa fa-sort-amount-asc"></i>
                                    <span>Сорт. в коллекции</span>
                                </a>
                            </li>

                            <li class="{{ active_class(Active::checkUriPattern('admin/sort/zones*')) }}">
                                <a href="{{ route('admin.sort.index', 'zones') }}">
                                    <i class="fa fa-sort-amount-asc"></i>
                                    <span>Сорт. в зоне</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/baskets*')) }}">
                        <a href="{{ route('admin.baskets.index') }}">
                            <i class="fa fa-shopping-bag"></i>
                            <span>{{ trans('labels.backend.access.baskets.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/orders*')) }}">
                        <a href="{{ route('admin.orders.index') }}">
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{ trans('labels.backend.order.management') }}</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>

        @role(1)
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>

            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>{{ trans('menus.backend.access.title') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu
                    {{ active_class(Active::checkUriPattern([
                        'admin/access*',
                        'admin/settings*',
                    ]), 'menu-open') }}"
                    style="display: none;
                    {{ active_class(Active::checkUriPattern([
                        'admin/access*',
                        'admin/setting*',
                    ]), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/settings*')) }}">
                        <a href="{{ route('admin.settings.edit') }}">
                            <i class="fa fa-cog"></i>
                            <span>{{ trans('labels.backend.settings.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                        <a href="{{ route('admin.access.user.index') }}">
                            <i class="fa fa-address-book-o"></i>
                            <span>{{ trans('labels.backend.access.users.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                        <a href="{{ route('admin.access.role.index') }}">
                            <i class="fa fa-key"></i>
                            <span>{{ trans('labels.backend.access.roles.management') }}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'menu-open') }}"
                    style="display: none; {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                        <a href="{{ route('log-viewer::dashboard') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer/logs')) }}">
                        <a href="{{ route('log-viewer::logs.list') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
        @endauth
    </section><!-- /.sidebar -->
</aside>