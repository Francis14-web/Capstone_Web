<div class="relative w-fit">
    <aside id="sidebar" class="fixed top-0 left-0 max-w-[270px] w-full bg-[#1e4d2b] h-screen">
        <div class="flex flex-col h-full justify-between pb-5">
            <div>
                <img src="{{ asset('img/TF.jpg')}}" alt="Logo" class="rounded-full my-10 w-28 h-28 mx-auto">
                <div class="flex flex-col h-full gap-2 ml-10">
                    <x-sidebar-link route="canteen.dashboard" icon="bx bxs-home" label="Home" />
                    <x-sidebar-link route="canteen.menu" icon="bx bxs-book" label="Menu" />
                    <x-sidebar-link route="" icon="bx bxs-credit-card-front" label="Sales" />
                    <x-sidebar-link route="" icon="bx bxs-cart-alt" label="Order" />
                    <x-sidebar-link route="" icon="bx bxs-message" label="Messages" />
                </div>
            </div>
            <div class="ml-10">
                <x-sidebar-link route="" icon="bx bxs-user-circle" label="Profile" />
                <x-sidebar-link route="canteen.logout" icon="bx bxs-exit" label="Logout" />
            </div>
        </div>
    </aside>
</div>


