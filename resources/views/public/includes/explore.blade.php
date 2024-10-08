<section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">Browse Topics</h1>
                    </div>

                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      @foreach($categories as $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$loop->first?'active':''}}" id="t{{$category['id']}}-tab" data-bs-toggle="tab"
                                data-bs-target="#t{{$category['id']}}-tab-pane" type="button" role="tab"
                                aria-controls="t{{$category['id']}}-tab-pane" aria-selected="{{($loop->first)?'true':'false'}}" title="{{$category['category_name']}}">{{Str::limit($category['category_name'],15,'...')}}</button>
                        </li>
                      @endforeach
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                    
                        <div class="tab-content" id="myTabContent">
                        @foreach($categories as $category)
                            <div class="tab-pane fade {{($loop->first)?'show active':''}}" id="t{{$category['id']}}-tab-pane" role="tabpanel"
                                aria-labelledby="t{{$category['id']}}-tab" tabindex="0">
                                <div class="row">
                                @foreach($category->latest_topics as $topic)
                                    <div class="col-lg-4 col-md-6 col-12 {{$loop->last?'':'mb-4 mb-lg-0'}}">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="{{route('topics_detail',$topic['id'])}}">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2" title="{{$topic['topic_title']}}">{{Str::limit($topic['topic_title'],60,'...')}}</h5>

                                                        <p class="mb-0">{{Str::limit($topic['content'],44,'...')}}</p>
                                                    </div>

                                                    <span class="badge bg-design rounded-pill ms-auto">{{$topic['no_of_views']}}</span>
                                                </div>

                                                <img src='{{asset("assets/images/topics/".$topic["image"])}}'
                                                    class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        @endforeach
                        </div>

                    </div>
                </div>
        </section>