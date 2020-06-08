<h1>Customers</h1>
<a href="/customers/create">Add new Customer</a>
@forelse ($customers as $customer)
<a href="/customers/{{ $customer->id }}"><h3>{{  $customer->name }}</h3></a>
    <p>{{ $customer->email }}</p>
@empty
    <p>No Customers found</p>
@endforelse