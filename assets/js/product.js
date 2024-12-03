const apiUrl = 'https://localhost:7237/api/Product';
let categories = ['Nước Hoa', 'Son Môi', 'Phấn','Mỹ Phẩm Chăm Sóc Da','Khác']; 

const productList = document.getElementById('product-list');
const productForm = document.getElementById('product-form');
const categoryForm = document.getElementById('category-form');
const categorySelect = document.getElementById('category');
const categoryFilter = document.getElementById('category-filter');
const errorMessage = document.getElementById('error-message');


function renderCategories() {

    categorySelect.innerHTML = '';
    categories.forEach(category => {
        const option = document.createElement('option');
        option.value = category;
        option.textContent = category;
        categorySelect.appendChild(option);
    });

    categoryFilter.innerHTML = '<option value="">Tất cả</option>';
    categories.forEach(category => {
        const option = document.createElement('option');
        option.value = category;
        option.textContent = category;
        categoryFilter.appendChild(option);
    });
}


categoryForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const newCategory = document.getElementById('new-category').value.trim();
    if (newCategory && !categories.includes(newCategory)) {
        categories.push(newCategory);
        renderCategories();
        categoryForm.reset();
    } else {
        alert('Danh mục đã tồn tại hoặc không hợp lệ!');
    }
});


async function loadProducts(filterCategory = '') {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Không thể tải danh sách sản phẩm.');
        const products = await response.json();

        productList.innerHTML = '';
        const filteredProducts = products.filter(product =>
            !filterCategory || product.category === filterCategory
        );
        filteredProducts.forEach(product => {
            const productCard = `
                        <div class="col-md-4">
                            <div class="card product-card">
                                <div class="card-body">
                                    <h5 class="card-title">${product.name}</h5>
                                    <p class="card-text">
                                        Giá: ${product.price.toLocaleString()} VND<br>
                                        Số lượng: ${product.quantity}<br>
                                        Danh mục: ${product.category}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-warning btn-sm" onclick="editProduct(${product.id})">Sửa</button>
                                        <button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.id})">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            productList.innerHTML += productCard;
        });
    } catch (error) {
        console.error(error);
        alert('Lỗi tải danh sách sản phẩm.');
    }
}


function filterProducts() {
    const selectedCategory = categoryFilter.value;
    loadProducts(selectedCategory);
}


productForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = document.getElementById('product-id').value;
    const name = document.getElementById('name').value;
    const price = parseFloat(document.getElementById('price').value);
    const quantity = parseInt(document.getElementById('quantity').value);
    const category = categorySelect.value;

    const product = { name, price, quantity, category };
    const method = id ? 'PUT' : 'POST';
    const url = id ? `${apiUrl}/${id}` : apiUrl;

    try {
        const response = await fetch(url, {
            method,
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(product)
        });
        if (!response.ok) throw new Error('Không thể lưu sản phẩm.');
        productForm.reset();
        loadProducts();
    } catch (error) {
        console.error(error);
        alert('Lỗi lưu sản phẩm.');
    }
});

async function deleteProduct(id) {
    if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) return;
    try {
        const response = await fetch(`${apiUrl}/${id}`, { method: 'DELETE' });
        if (!response.ok) throw new Error('Không thể xóa sản phẩm.');
        loadProducts();
    } catch (error) {
        console.error(error);
        alert('Lỗi xóa sản phẩm.');
    }
}


async function editProduct(id) {
    try {
        const response = await fetch(`${apiUrl}/${id}`);
        if (!response.ok) throw new Error('Không thể tải thông tin sản phẩm.');
        const product = await response.json();

        document.getElementById('product-id').value = product.id;
        document.getElementById('name').value = product.name;
        document.getElementById('price').value = product.price;
        document.getElementById('quantity').value = product.quantity;
        categorySelect.value = product.category;
    } catch (error) {
        console.error(error);
        alert('Lỗi chỉnh sửa sản phẩm.');
    }
}


renderCategories();
loadProducts();