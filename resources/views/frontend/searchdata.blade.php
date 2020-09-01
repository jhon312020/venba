 @if(isset($searchfilter))  
  <div class="container">
        <div class="row">
          <div class="col-12 pb-3 text-center"> 
            <h3 id="result_count"> <span id="search_word">{{$searchcount}} search results for "{{$search}}" </span></h3>
            <span class="triangle"></span>
          </div> 
        </div>
      </div>    
     <div class="bg-white">
        <div class="container py-3">
          <div class="row">
            <div class="col-12 py-3 col-lg-10 offset-lg-1" id="searchdata">
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
             
               {!! $searchfilter->links() !!} 
              <!-- <ul class="pagination">
                <?php/* echo with(new FirstlastPagination($paginator))->render();*/ ?>
              </ul> -->
              @endif