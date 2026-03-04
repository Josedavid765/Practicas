# 🚀 TaskMaster 3000 - Laravel Dockerizado

Bienvenido al **TaskMaster 3000**, una aplicación de gestión de tareas construida con **Laravel 11** y **Arquitectura Hexagonal**, completamente preparada para despliegue inmediato mediante contenedores.

## 🛠️ Stack Tecnológico

- **Framework:** Laravel 11
- **Lenguaje:** PHP 8.4-fpm
- **Servidor Web:** Nginx (Alpine)
- **Infraestructura:** Docker & Docker Compose

## 🐳 Despliegue con Docker

Esta aplicación está configurada para levantarse en segundos sin necesidad de instalar PHP o Nginx localmente.

### Requisitos previos
- Docker instalado.
- Docker Compose instalado.

### Instalación y arranque
1. **Clona el repositorio**
2. **Construye y levanta los contenedores:**
   ```bash
   sudo docker compose up -d --build

```

3. **Accede a la aplicación:**
Abre tu navegador en [http://localhost:8080](https://www.google.com/search?q=http://localhost:8080)

## 🔧 Comandos Útiles de Docker

* **Ver logs en tiempo real:**
```bash
sudo docker compose logs -f

```

* **Entrar a la terminal del contenedor PHP:**
```bash
sudo docker exec -it taskmaster-app bash

```

* **Detener los servicios:**
```bash
sudo docker compose down


```


## 🛡️ Solución de problemas de permisos

Si encuentras errores de escritura en la base de datos SQLite o logs, ejecuta:

```bash
sudo docker exec -it taskmaster-app chown -R www-data:www-data /var/www/storage /var/www/database
sudo docker exec -it taskmaster-app chmod -R 775 /var/www/storage /var/www/database