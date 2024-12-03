const apiUrl = 'https://localhost:7237/api/Product'; 

async function loadStatistics() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Lỗi khi tải dữ liệu sản phẩm.');

        const products = await response.json();

        const productCount = products.length;
        const totalRevenue = products.reduce((acc, product) => acc + product.price * product.quantity, 0);
        const discountedRevenue = totalRevenue * 0.85; 
        const totalQuantity = products.reduce((acc, product) => acc + product.quantity, 0); 

        document.getElementById('product-count').textContent = productCount;
        document.getElementById('order-count').textContent = 'Đang cập nhật...'; 
        document.getElementById('total-quantity').textContent = totalQuantity.toLocaleString(); 
        document.getElementById('revenue').textContent = discountedRevenue.toLocaleString() + ' VND'; 

        loadDetailedInfo(products);  
    } catch (error) {
        console.error(error);
        alert('Lỗi khi tải thống kê.');
    }
}


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


loadStatistics();