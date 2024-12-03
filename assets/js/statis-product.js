const apiUrl = 'https://localhost:7237/api/Product';  // API để lấy dữ liệu sản phẩm

// Hàm để lấy thống kê và hiển thị lên giao diện
async function loadStatistics() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Lỗi khi tải dữ liệu sản phẩm.');

        const products = await response.json();

        const productCount = products.length;
        const totalRevenue = products.reduce((acc, product) => acc + product.price * product.quantity, 0);
        const discountedRevenue = totalRevenue * 0.85; // Áp dụng giảm giá 15%
        const totalQuantity = products.reduce((acc, product) => acc + product.quantity, 0); // Tổng số lượng sản phẩm

        document.getElementById('product-count').textContent = productCount;
        document.getElementById('order-count').textContent = 'Đang cập nhật...';  // Đơn hàng sẽ cần API riêng
        document.getElementById('total-quantity').textContent = totalQuantity.toLocaleString();  // Tổng số lượng sản phẩm
        document.getElementById('revenue').textContent = discountedRevenue.toLocaleString() + ' VND'; // Hiển thị doanh thu sau giảm giá

        loadDetailedInfo(products);  // Hiển thị thông tin chi tiết sản phẩm
    } catch (error) {
        console.error(error);
        alert('Lỗi khi tải thống kê.');
    }
}


// Hàm hiển thị thông tin chi tiết sản phẩm
function loadDetailedInfo(products) {
    const table = `
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá (VND)</th>
                            <th>Số Lượng</th>
                            <th>Danh Mục</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${products.map(product => `
                            <tr>
                                <td>${product.name}</td>
                                <td>${product.price.toLocaleString()}</td>
                                <td>${product.quantity}</td>
                                <td>${product.category}</td>
                            </tr>`).join('')}
                    </tbody>
                </table>
            `;
    document.getElementById('detailed-info').innerHTML = table;
}

// Khởi tạo
loadStatistics();