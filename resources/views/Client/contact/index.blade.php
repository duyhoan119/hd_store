@extends('Client.index')
@section('title','Contact')
@section('show_content')
    <div class="space-y-4">
        <h2 class="text-2xl font-semibold text-center">Contact</h2>
        <div class="grid grid-cols-12 ">
            <div class="col-span-6">
                <iframe class="rounded-md" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.664803640124!2d105.77544867503076!3d21.006069480637542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345353b6b4ee2b%3A0xcefa4635c6a5ff28!2zMTEyIFAuIE3hu4UgVHLDrCBUaMaw4bujbmcsIE3hu4UgVHLDrCwgTmFtIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1715674240779!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-span-6">
                <form class="space-y-3 px-4" action="#">
                <div>
                        <label class="text-lg font-semibold text-gray-700"  for="name">Name</label>
                        <input class="border rounded-md px-2 py-1 w-full" type="text" name="name" id="name">
                </div>
                <div>
                        <label class="text-lg font-semibold text-gray-700"  for="phone">Phone number</label>
                        <input class="border rounded-md px-2 py-1 w-full" type="number" name="phone" id="phone">
                </div>
                <div>
                        <label class="text-lg font-semibold text-gray-700"  for="email">Email</label>
                        <input class="border rounded-md px-2 py-1 w-full" type="email" name="email" id="email">
                </div>
                    <div>
                        <label class="text-lg font-semibold text-gray-700"  for="content">Content</label>
                        <textarea class="border rounded-md px-2 py-1 w-full" type="text" name="content" id="content"></textarea>
                    </div>
                    <button class="bg-cyan-500 border rounded-md px-4 py-1 text-white text-lg font-semibold" type="button">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection