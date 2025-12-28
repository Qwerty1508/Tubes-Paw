// Method untuk tampilkan form
public function create()
{
    return view('admin.menus.create');
}

// Method untuk simpan menu
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|in:Makanan,Minuman,Dessert,Paket',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'is_available' => 'boolean'
    ]);

    $menu = new Menu();
    $menu->name = $request->name;
    $menu->description = $request->description;
    $menu->price = $request->price;
    $menu->category = $request->category;
    $menu->is_available = $request->has('is_available');
    
    // Generate slug
    $menu->slug = Str::slug($request->name);

    // Simpan gambar jika ada
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('menus', 'public');
        $menu->image_url = $path;
        // Di MenuController.php
public function update(Request $request, Menu $menu)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category' => 'required|in:Makanan,Minuman,Dessert,Appetizer',
        'image_url' => 'nullable|string', // Bisa data URL atau URL biasa
        'is_available' => 'boolean'
    ]);

    $menu->update($request->except(['_token', '_method']));
    return redirect()->route('admin.menus.index')->with('success', 'Menu diperbarui!');
}
    }

    $menu->save();

    return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil ditambahkan!');
}