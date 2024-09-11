<section class="section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h3 class="mb-4">Popular Topics</h3>
                        </div>

                        <div class="col-lg-8 col-12 mt-3 mx-auto">
                            @foreach($topics as $topic)
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                <div class="d-flex">
                                    <img src='{{asset("assets/images/topics/".$topic["image"])}}' class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-topics-listing-info d-flex">
                                        <div>
                                            <h5 class="mb-2">{{$topic['topic_title']}}</h5>

                                            <p class="mb-0">{{Str::limit($topic['content'],123,'...')}}.</p>

                                            <a href="{{route('topics_detail', $topic->id)}}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                                        </div>

                                        <span class="badge bg-design rounded-pill ms-auto">{{$topic['no_of_views']}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-12 col-12" >
                        <ul class="pagination justify-content-center mb-0">{{$topics->links()}}
                        </ul>
                        </div>
                    </div>
                </div>
            </section>