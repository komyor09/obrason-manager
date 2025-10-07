<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Панель управления" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Заказы" :link="route('orders')" icon="bi bi-cart3"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Доставшики" :link="route('delivers')" icon="bi bi-truck"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Клиенты" :link="route('client')" icon="bi bi-people"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Товары" :link="route('products')" icon="bi bi-boxes"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Управление" icon="bi bi-gear">
        <x-maz-sidebar-sub-item name="Добавить курьера" :link="route('deliver.create')"
            icon="bi bi-person-plus"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Добавить товар" :link="route('product.create')" icon="bi bi-box"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Изменить курьера" :link="route('deliver.index')"
            icon="bi bi-person-lines-fill"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Изменить товар" :link="route('product.index')"
            icon="bi bi-pencil-square"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>

</x-maz-sidebar>
