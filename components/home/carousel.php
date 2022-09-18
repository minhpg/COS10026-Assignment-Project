<div class="md:rounded-xl bg-base-200 p-10 my-5 shadow">
    <div class="text-base-content">
        <h2 class="text-4xl font-black uppercase">TRENDING RIGHT NOW</h2>
        <div class="mt-5">
            <div class="carousel carousel-center rounded-box">
                <div class="carousel-item">
                    <?php 
                    $i = 0;
                    for ($i; $i<=10; $i++){
                        echo '
                      <div class="card w-56 bg-base-100 shadow-xl  mx-5">
                        <figure>
                            <img src="https://placeimg.com/400/250/arch" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title font-black">
                                Shoes!
                                <div class="badge badge-secondary">NEW</div>
                            </h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p>
                            <p x-text="i"></p>
                            <div class="card-actions justify-center">
                                <a class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>';
                }; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>