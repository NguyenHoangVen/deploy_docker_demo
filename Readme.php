<?php
// Access: http://localhost:8080/readme.php
// OR http://localhost:8080

/*
============================================================
Dockerfile:
============================================================
=>  It is used to build docker image.

    # 🧱 1. Base image
    FROM php:8.2-fpm

    # 🛠️ 2. Cài đặt các extension cần thiết
    RUN docker-php-ext-install pdo pdo_mysql

    # 🗂️ 3. Thiết lập thư mục làm việc
    WORKDIR /var/www/html

    # 📦 4. Copy mã nguồn vào container
    COPY . /var/www/html

    # ⚙️ 5. Gán quyền (tuỳ chọn)
    RUN chown -R www-data:www-data /var/www/html


==============================================================
    dokcker composer
==============================================================
1.services :Defines the containers that will run. Each service is like a named container.
2.build : Used when you want to build a Docker image from a Dockerfile.
3.image: Use an existing Docker image from Docker Hub (or a private registry).
4.container_name: Gives your container a fixed name (instead of random auto-generated names).
5. ports: Maps host ports to container ports.
    ports:
        - "8080:80"   # Host:Container
6. volumnes: Mounts folders/files from your machine to the container.



==============================
BUILD $ RUN
===============================
# Docker compose commands:

    docker compose up -d --build # Build the images and start the containers in detached mode.
    docker compose up -d # Chạy các container đã build mà không cần build lại.
    docker compose down # Dừng và xóa các container, mạng, volumes (tuỳ chọn) được tạo bởi docker-compose.yml
    docker compose logs # Xem log của tất cả các container
    docker compose logs <service_name> # Xem log của một service cụ thể
    docker compose exec <service_name> bash # Truy cập vào terminal của một service cụ thể
    docker compose build {service_name} # Chỉ build lại một service cụ thể
    docker compose restart # Khởi động lại tất cả các container
    docker compose restart <service_name> # Khởi động lại một service cụ thể

# Docker images commands:

    docker images # Liệt kê các image đã build
    docker images -a # Liệt kê tất cả image (bao gồm cả image trung gian)
    docker rmi <image_name> # Xóa một image cụ thể


# Docker container commands:
    docker ps # Liệt kê các container đang chạy
    docker ps -a # Liệt kê tất cả container (bao gồm cả container đã dừng)
    docker run -d --name <container_name> <image_name> # Chạy một container mới từ một image
    docker stop <container_name> # Dừng một container đang chạy
    docker start <container_name> # Khởi động lại một container đã dừng
    docker rm <container_name> # Xóa một container đã dừng
    docker logs <container_name> # Xem log của container
    docker exec -it <container_name> bash # Truy cập vào terminal của container