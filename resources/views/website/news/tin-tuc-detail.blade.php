<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bệnh Viện Laptop 51</title>
    @include('layout_client.style')

</head>

<body class="template-page-service-style-2">
    <div class="template-header template-header-background template-header-background-1">

        <!-- Top header -->
        @include('layout_client.menu')
        <div class="template-header-bottom">

            <div class="template-main">

                <div class="template-header-bottom-page-title">
                    <h1>Tin tức</h1>
                </div>

                <div class="template-header-bottom-page-breadcrumb">
                    <a href="/">Trang chủ</a><span class="template-icon-meta-arrow-right-12"></span><a
                        href="/tin-tuc">Tin tức</a>
                </div>

            </div>

        </div>

    </div>


    <!-- Content -->
    <div class="template-content">
        <div class="template-section template-main">
            <div class="template-content-layout template-content-layout-sidebar-left template-clear-fix">
                <div class="template-content-layout-column-left">
                    <ul class="template-widget-list">
                        <!-- Widget -->
                        <li>
                            <div class="template-widget">
                                <h6>Danh Mục</h6>

                                <!-- Categories widget -->
                                <div class="template-widget-category">
                                    <ul>
                                        @foreach ($category_news as $item)
                                            <li>
                                                <a href="{{ route('category', ['id' => $item->id]) }}">
                                                    <span>{{ $item->name }}</span>
                                                    <span>{{ count($item->news) }} bài viết</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </li>

                        <!-- Widget -->
                        <li>
                            <div class="template-widget">
                                <h6>Tin tức hot</h6>

                                <!-- Latest post widget -->
                                <div class="template-widget-latest-post">
                                    <ul>
                                        @foreach ($news_all as $item)
                                            @if ($item->status == 1)
                                                <li>
                                                    <a href="{{ route('tin-tuc-detail', ['id' => $item->id]) }}">
                                                        <img src="{{ asset($item->image) }}" alt="" width="100" />
                                                        <span>{{ $item->title }}</span>
                                                        <span
                                                            class="template-icon-meta-time"><span>{{ $item->created_at }}</span></span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="template-content-layout-column-right">
                    <div class="template-blog template-blog-style-2">

                        <div class="template-component-header-subheader">
                            <h2>{{ $news->title }}</h2>
                            <div></div>
                            <span> {{ $news->created_at->format('M-d-Y') }} -
                                @if (!empty($news->category_news->name))
                                    {{ $news->category_news->name }}
                                @endif
                            </span>
                        </div>
                        <div class="template-clear-fix template-align-center">

                            <!-- Text -->
                            <p>
                                {!! $news->description !!}
                            </p>

                            <!-- Space -->
                            <div class="template-component-space template-component-space-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout_client.footer')
    @include('layout_client.script')
</body>
