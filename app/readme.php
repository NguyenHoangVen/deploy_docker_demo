<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Learning Guide</title>
    <link rel="stylesheet" href="common/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>🐳 Docker Learning Guide</h1>
            <p>Hướng dẫn toàn diện về Docker, Docker Compose và các lệnh cơ bản</p>
        </header>

        <div class="content">
            <!-- Section 1: Dockerfile -->
            <div class="section">
                <h2><span class="emoji">🧱</span>Dockerfile</h2>
                <p>Dockerfile được sử dụng để build Docker image. Đó là một tập hợp các hướng dẫn để tạo một image.</p>
                
                <h3>Cấu trúc cơ bản:</h3>
                
                <div class="card">
                    <h4><span class="emoji">1️⃣</span>Base Image</h4>
                    <div class="code-block"><code><span class="command">FROM php:8.2-fpm</span></code></div>
                    <p>Chọn image cơ sở (PHP 8.2 với FPM)</p>
                </div>

                <div class="card">
                    <h4><span class="emoji">2️⃣</span>Cài đặt Extensions</h4>
                    <div class="code-block"><code><span class="command">RUN docker-php-ext-install pdo pdo_mysql</span></code></div>
                    <p>Cài đặt các extension PHP cần thiết (PDO, PDO MySQL)</p>
                </div>

                <div class="card">
                    <h4><span class="emoji">3️⃣</span>Thiết lập Thư mục làm việc</h4>
                    <div class="code-block"><code><span class="command">WORKDIR /var/www/html</span></code></div>
                    <p>Đặt thư mục làm việc trong container</p>
                </div>

                <div class="card">
                    <h4><span class="emoji">4️⃣</span>Copy Mã nguồn</h4>
                    <div class="code-block"><code><span class="command">COPY . /var/www/html</span></code></div>
                    <p>Copy tất cả mã nguồn vào container</p>
                </div>

                <div class="card">
                    <h4><span class="emoji">5️⃣</span>Gán Quyền</h4>
                    <div class="code-block"><code><span class="command">RUN chown -R www-data:www-data /var/www/html</span></code></div>
                    <p>Gán quyền cho người dùng www-data</p>
                </div>
            </div>

            <!-- Section 2: Docker Compose -->
            <div class="section">
                <h2><span class="emoji">📝</span>Docker Compose</h2>
                <p>Docker Compose dùng để quản lý nhiều container cùng lúc qua một file cấu hình YAML.</p>

                <h3>Các thành phần chính:</h3>
                
                <div class="highlight">
                    <strong>⚠️ Lưu ý:</strong> Docker Compose giúp quản lý toàn bộ ứng dụng với nhiều service (PHP, MySQL, Nginx, v.v.)
                </div>

                <div class="card">
                    <h4>1. Services</h4>
                    <p>Định nghĩa các containers sẽ chạy. Mỗi service là một container có tên gọi.</p>
                </div>

                <div class="card">
                    <h4>2. Build</h4>
                    <p>Dùng khi bạn muốn build Docker image từ Dockerfile.</p>
                </div>

                <div class="card">
                    <h4>3. Image</h4>
                    <p>Sử dụng image có sẵn từ Docker Hub hoặc private registry.</p>
                </div>

                <div class="card">
                    <h4>4. Container_name</h4>
                    <p>Đặt tên cụ thể cho container (thay vì tên ngẫu nhiên).</p>
                </div>

                <div class="card">
                    <h4>5. Ports</h4>
                    <p>Map cổng từ máy tính (host) tới container</p>
                    <div class="code-block"><code>ports:
  - "8080:80"   <span class="comment"># Host:Container</span></code></div>
                </div>

                <div class="card">
                    <h4>6. Volumes</h4>
                    <p>Mount thư mục/file từ máy tính vào container</p>
                </div>
            </div>

            <!-- Section 3: Docker Compose Commands -->
            <div class="section">
                <h2><span class="emoji">⚙️</span>Docker Compose Commands</h2>
                <p>Các lệnh để quản lý containers qua Docker Compose:</p>

                <div class="code-block"><code><span class="command">docker compose up -d --build</span>
<span class="comment"># Build images và chạy containers ở chế độ detached</span><br/>
<br/>
<span class="command">docker compose up -d</span>
<span class="comment"># Chạy containers đã build mà không cần build lại</span><br/>
<br/>
<span class="command">docker compose down</span>
<span class="comment"># Dừng và xóa containers, mạng, volumes</span><br/>
<br/>
<span class="command">docker compose logs</span>
<span class="comment"># Xem log của tất cả containers</span><br/>
<br/>
<span class="command">docker compose logs &lt;service_name&gt;</span>
<span class="comment"># Xem log của một service cụ thể</span><br/>
<br/>
<span class="command">docker compose exec &lt;service_name&gt; bash</span>
<span class="comment"># Truy cập vào terminal của một service</span><br/>
<br/>
<span class="command">docker compose build &lt;service_name&gt;</span>
<span class="comment"># Build lại một service cụ thể</span><br/>
<br/>
<span class="command">docker compose restart</span>
<span class="comment"># Khởi động lại tất cả containers</span><br/>
<br/>
<span class="command">docker compose restart &lt;service_name&gt;</span>
<span class="comment"># Khởi động lại một service cụ thể</span></code></div>
            </div>

            <!-- Section 4: Docker Images Commands -->
            <div class="section">
                <h2><span class="emoji">🖼️</span>Docker Images Commands</h2>
                <p>Các lệnh để quản lý Docker images:</p>

<div class="code-block"><code><span class="command">docker images</span>
<span class="comment"># Liệt kê các image đã build</span><br/>
<br/>
<span class="command">docker images -a</span>
<span class="comment"># Liệt kê tất cả images (bao gồm cả image trung gian)</span><br/>
<br/>
<span class="command">docker rmi &lt;image_name&gt;</span>
<span class="comment"># Xóa một image cụ thể</span>
<br/><br/>

<span class="command">docker build -f {docker/worker/Dockerfile} -t myapp-worker:1.0 .</span>
<span class="comment"># Build image mới từ Dockerfile</span>
<br/>
<span class="comment"># -f Chỉ định dockerfile cụ thể <br># -t đặt tên và tag cho image</span>
</code></div>

            </div>

            <!-- Section 5: Docker Container Commands -->
            <div class="section">
                <h2><span class="emoji">📦</span>Docker Container Commands</h2>
                <p>Các lệnh để quản lý Docker containers:</p>

                <div class="code-block"><code><span class="command">docker ps</span>
<span class="comment"># Liệt kê các container đang chạy</span><br/>
<br/>
<span class="command">docker ps -a</span>
<span class="comment"># Liệt kê tất cả containers (bao gồm cả container đã dừng)</span><br/>
<br/>
<span class="command">docker run -d --name &lt;container_name&gt; &lt;image_name&gt;</span>
<span class="comment"># Chạy container mới từ một image</span><br/>
<br/>
<span class="command">docker stop &lt;container_name&gt;</span>
<span class="comment"># Dừng một container đang chạy</span><br/>
<br/>
<span class="command">docker start &lt;container_name&gt;</span>
<span class="comment"># Khởi động lại container đã dừng</span><br/>
<br/>
<span class="command">docker rm &lt;container_name&gt;</span>
<span class="comment"># Xóa một container đã dừng</span><br/>
<br/>
<span class="command">docker logs &lt;container_name&gt;</span>
<span class="comment"># Xem log của container</span><br/>
<br/>
<span class="command">docker exec -it &lt;container_name&gt; bash</span>
<span class="comment"># Truy cập vào terminal của container</span></code></div>
            </div>

            <!-- Quick Reference -->
            <div class="section">
                <h2><span class="emoji">📚</span>Tham Khảo Nhanh</h2>
                
                <h3>Quy trình cơ bản:</h3>
                <ol>
                    <li>Viết <code>Dockerfile</code> để định nghĩa image</li>
                    <li>Viết <code>docker-compose.yml</code> để quản lý multiple containers</li>
                    <li>Chạy <code>docker compose up -d --build</code> để khởi động ứng dụng</li>
                    <li>Sử dụng các lệnh <code>docker compose</code> để quản lý</li>
                </ol>

                <h3>Lệnh cần nhớ nhất:</h3>
                <ul>
                    <li><code>docker compose up -d --build</code> - Khởi động toàn bộ ứng dụng</li>
                    <li><code>docker compose down</code> - Tắt toàn bộ ứng dụng</li>
                    <li><code>docker compose logs</code> - Xem lỗi/hoạt động</li>
                    <li><code>docker compose exec &lt;service&gt; bash</code> - Debug trong container</li>
                </ul>
            </div>
        </div>

        <footer>
            <p>📖 Docker Learning Guide | Updated: February 2026</p>
            <p>Hãy thử các lệnh Docker để hiểu rõ hơn về container technology!</p>
        </footer>
    </div>
</body>
</html>
