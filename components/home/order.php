<div class="my-5 flex justify-center text-base-content" x-data="{ delivery: true, pickup: false }">
    <div class="card flex-shrink-0 w-full max-w-lg shadow-xl bg-base-200">
        <div class="tabs font-bold w-full bg-base-200">
            <a class="tab tab-lifted tab-lg w-1/2" x-on:click="delivery=true; pickup=false" :class="delivery ? 'tab-active text-base-content' : ''">Delivery</a>
            <a class="tab tab-lifted tab-lg w-1/2" x-on:click="delivery=false; pickup=true" :class="pickup ? 'tab-active text-base-content' : ''">Pickup</a>
        </div>
        <div class="card-body">
            <h1 class="card-title" x-text="`Enter your ${delivery ? 'address' : 'postal code'}`"></h1>
            <div class="input-group">
                <input type="text" :placeholder="delivery ? 'e.g. 24 Wakefield St, Hawthorn, VIC' : 'e.g. 3122'" class="input input-bordered w-full" />
                <button class="btn btn-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>