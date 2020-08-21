 @if(isset($searchfilter))
 @foreach($searchfilter as $item) 
              <div class="search-items">
                <div class="row">
                  <div class="col-12 col-lg-3 text-center">
                    <img src="images/product-img.jpg" class="product-img" alt="">
                  </div>
                  <div class="col-12 col-lg-9">
                    <h4>{{$item->name}}</h4>                    
                    <p class="pt-3"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>
                    
                    <div class="row">
                      <div class="col">
                        <h5 class="pt-3 price">Rs. {{$item->price}}</h5>  
                      </div>
                      <div class="col">
                        <button class="btn btn-secondary">Add to Kart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
              @endforeach             
            </div> 
            <div class="col-12 col-lg-10 offset-lg-1 py-lg-4">
              <!-- <nav aria-label="Page navigation" class="pagination">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true"><<</span> 
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true"><</span> 
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">>></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav> -->
              {!! $searchfilter->links() !!}
              @endif