@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'finish-tissue')

@section('before_header')
    <div id="wrapper-bg-faq" class="wrapper-bg"></div>
@endsection

@section('content')

    <section id="top-waves" class="relative"></section>

    <section id="catalogue" class="finish-tissue">
        <div class="container">
            <div class="wrap-catal clearfix bg-white-marmur fin_tis hide">
                <div class="catal-side relative">
                    <div class="catal-filter-head">
                        <!--<svg class="title-wave" viewBox="0 0 1395.63 1237.68">-->
                        <!--<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>-->
                        <!--</svg>-->
                        <div class="filter-title">{{ trans('frontend.finishTissue.filter') }}</div>
                        <div class="close-catal-menu"></div>
                    </div>
                    <div class="wrap-catal-side-items">
                        <div class="inner-catal-side-items">
                            <div class="wrap-zon-col-side fin_tis">
                                <div class="zon-col-side">
                                    <div class="zon-col-side-toggle bord">
                                        <a class="arr-fin_tis active fin" for="zones"
                                           href="#">{{ trans('frontend.finishTissue.finishing') }}</a>
                                        <a class="arr-fin_tis tis" href="#"
                                           for="collections">{{ trans('frontend.finishTissue.tissue') }}</a>
                                    </div>
                                </div>

                                <div class="zon-col-side zon-col-list-title">
                                    <div class="zon-col-side-toggle">{{ trans('frontend.finishTissue.zones') }}</div>
                                </div>

                                <ul class="zon-col-list-catal zones">
                                    @foreach($finishTissues as $key => $finishTissue)
                                        @if($finishTissue->parent_id == null AND $finishTissue->type == 'finish')
                                            <li><a href="#f-{{ $key }}" class="anim-underline">
                                                    {{ $finishTissue->{'title'.$langSuf} }}
                                                </a>
                                                <div class="disactive-item"></div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                                <div class="zon-col-side zon-col-list-title">
                                    <div class="zon-col-side-toggle">{{ trans('frontend.finishTissue.collections') }}</div>
                                </div>

                                <ul class="zon-col-list-catal collections">
                                    @foreach($finishTissues as $key => $finishTissue)
                                        @if($finishTissue->parent_id == null AND $finishTissue->type == 'tissue')
                                            <li><a href="#t-{{ $key }}" class="anim-underline">
                                                    {{ $finishTissue->{'title'.$langSuf} }}
                                                </a>
                                                <div class="disactive-item"></div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="catal-content">
                    <div class="catal-content-inner fin_tis">
                        <div class="swiper-wrapper wrap-fin_tis">
                            <div class="inner-fin_tis swiper-slide bg-white-marmur">

                                @foreach($finishTissues as $key => $finishTissue)
                                    @if($finishTissue->parent_id == null AND $finishTissue->type == 'finish')
                                        <div id=f-{{ $key }} class="wrap-fin_tis-one_type">
                                            <div class="title-fin_tis">
                                                {{ $finishTissue->{'title'.$langSuf} }}
                                            </div>
                                            <div class="wrap-items-fin_tis clearfix">
                                                @foreach($finishTissue->children as $child)
                                                    <div class="item-fin_tis">
                                                        <div class="item-fin_tis-texture"
                                                             style="background-image: url(/upload/images/{{$child->image}})"></div>
                                                        <div class="item-fin_tis-code">{{ $child->title }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="inner-fin_tis swiper-slide bg-white-marmur">
                                @foreach($finishTissues as $key => $finishTissue)
                                    @if($finishTissue->parent_id == null AND $finishTissue->type == 'tissue')
                                        <div id=t-{{ $key }} class="wrap-fin_tis-one_type">
                                            <div class="title-fin_tis">
                                                {{ $finishTissue->{'title'.$langSuf} }}
                                            </div>
                                            <div class="wrap-items-fin_tis clearfix">
                                                @foreach($finishTissue->children as $child)
                                                    <div class=item-fin_tis>
                                                        <div class="item-fin_tis-texture"
                                                             style="background-image: url(/upload/images/{{$child->image}})"></div>
                                                        <div class="item-fin_tis-code">{{ $child->title }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection