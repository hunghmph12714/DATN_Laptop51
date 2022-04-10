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

                                <!-- Widget header -->
                                <h6>Tìm kiếm tin tức</h6>

                                <!-- Search widget -->
                                <div class="template-widget-search">
                                    <div class="template-component-search-form">
                                        <form action="" method="get">
                                            <div>
                                                <input type="text" name="keyword"
                                                    value="{{ $searchData['keyword'] }}" />
                                                <span class="template-icon-meta-search"></span>
                                                <input type="submit" name="submit" value="" />
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <!-- Widget -->
                        <li>
                            <div class="template-widget">
                                <h6>Danh Mục</h6>

                                <!-- Categories widget -->
                                <div class="template-widget-category">
                                    <ul>
                                        @foreach ($cates_all as $item)
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
                                        @foreach ($news as $item)
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

                        <ul>
                            @foreach ($news as $item)
                                @if ($item->category_news_id == $cates->id && $item->status == 1)
                                    <li>
                                        <!-- Header -->
                                        <div class="template-blog-header">

                                            <!-- Date -->
                                            <div>
                                                <div class="template-blog-header-date">
                                                    <span>Tháng {{ $item->created_at->format('m') }}</span>
                                                    <span>{{ $item->created_at->format('d') }}</span>
                                                    <span>Năm {{ $item->created_at->format('Y') }}</span>
                                                </div>
                                            </div>

                                            <!-- Header + Meta -->
                                            <div>

                                                <!-- Header -->
                                                <h3 class="template-blog-header-header">
                                                    <a
                                                        href="{{ route('tin-tuc-detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                                </h3>

                                                <!-- Meta -->
                                                <div class="template-blog-header-meta">
                                                    <span class="template-icon-meta-user">
                                                        <a href="#">
                                                            @if ($item->user->id_role == 2)
                                                                Admin
                                                            @else
                                                                Nhan Vien
                                                            @endif
                                                        </a>
                                                    </span>
                                                    <span class="template-icon-meta-category">
                                                        <a href="{{ route('category', ['id' => $item->id]) }}">
                                                            @if (!empty($item->category_news->name))
                                                                {{ $item->category_news->name }}
                                                            @endif
                                                        </a>
                                                    </span>
                                                    <span class="template-icon-meta-comment">
                                                        <a href="#">25</a>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Image -->
                                        <div class="template-blog-image">
                                            <div class="template-component-image template-component-image-preloader">
                                                <a href="{{ route('tin-tuc-detail', ['id' => $item->id]) }}">
                                                    <img src="{{ asset($item->image) }}" alt="" width="300" />
                                                    <span class="template-component-image-hover"></span>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Excerpt -->
                                        <div class="template-blog-excerpt">
                                            <p>{{ $item->description_short }}</p>
                                            <a href="{{ route('tin-tuc-detail', ['id' => $item->id]) }}"
                                                class="template-component-button">Chi tiết</a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('layout_client.footer')
    @include('layout_client.script')
</body>
