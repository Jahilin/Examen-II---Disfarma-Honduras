# DISFARMA Honduras - Sistema Web de Gestión

Examen II - Unidad II · Programación Web · UNAH
Sistema en **Laravel 13** + **MySQL** + **SB Admin (Bootstrap 5)** para gestionar
medicamentos, proveedores mayoristas y personal de la droguería.

## Módulos
- **Autenticación**: login con correo institucional (@disfarma.hn), sesión segura y logout.
- **Medicamentos**: CRUD, subida de imagen, buscador, paginación y badges de stock.
- **Proveedores**: CRUD con validación de RTN, teléfono y crédito.
- **Empleados**: CRUD con validación de DNI, salario y cargo.
- **Dashboard**: 4 indicadores calculados desde la base de datos.

## Requisitos
- XAMPP (Apache + MySQL) o equivalente
- PHP 8.3 o superior
- Composer

## Instalación
1. Clonar el repositorio dentro de `xampp/htdocs`:
   ```
   git clone URL_DEL_REPOSITORIO
   cd nombre-de-la-carpeta
   ```
2. Instalar dependencias:
   ```
   composer install
   ```
3. Crear el archivo de entorno y la llave:
   ```
   copy .env.example .env
   php artisan key:generate
   ```
4. Iniciar Apache y MySQL en XAMPP y crear en phpMyAdmin una base de datos
   vacía llamada `disfarma_honduras`.
5. Crear las tablas y el usuario administrador:
   ```
   php artisan migrate --seed
   ```
6. Iniciar el servidor:
   ```
   php artisan serve
   ```
   Abrir http://127.0.0.1:8000

## Credenciales de prueba
- Correo: `admin@disfarma.hn`
- Contraseña: `Disfarma2026`

## Notas
- Las imágenes de medicamentos se guardan en `public/uploads/medicamentos/`.
- La plantilla SB Admin está en `public/sb_admin`.
- Zona horaria configurada: America/Tegucigalpa.

## Enlace a repositorio de GitHub
- `https://github.com/Jahilin/Examen-II---Disfarma-Honduras`