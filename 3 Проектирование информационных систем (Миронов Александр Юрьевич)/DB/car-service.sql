CREATE TABLE roles (
    id_role       BIGSERIAL PRIMARY KEY,
    role_name     VARCHAR(50) NOT NULL UNIQUE,
    description   VARCHAR(255)
);

CREATE TABLE employees (
    id_employee   BIGSERIAL PRIMARY KEY,
    full_name     VARCHAR(150) NOT NULL,
    position      VARCHAR(100) NOT NULL,
    phone         VARCHAR(20),
    CONSTRAINT chk_employees_full_name
        CHECK (btrim(full_name) <> '')
);

CREATE TABLE users (
    id_user         BIGSERIAL PRIMARY KEY,
    id_employee     BIGINT UNIQUE,
    id_role         BIGINT NOT NULL,
    login           VARCHAR(50) NOT NULL UNIQUE,
    password_hash   VARCHAR(255) NOT NULL,
    is_active       BOOLEAN NOT NULL DEFAULT TRUE,
    CONSTRAINT fk_users_employee
        FOREIGN KEY (id_employee)
        REFERENCES employees (id_employee)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    CONSTRAINT fk_users_role
        FOREIGN KEY (id_role)
        REFERENCES roles (id_role)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE clients (
    id_client     BIGSERIAL PRIMARY KEY,
    full_name     VARCHAR(150) NOT NULL,
    phone         VARCHAR(20),
    email         VARCHAR(120),
    comment       VARCHAR(300),
    CONSTRAINT uq_clients_phone UNIQUE (phone),
    CONSTRAINT uq_clients_email UNIQUE (email),
    CONSTRAINT chk_clients_full_name
        CHECK (btrim(full_name) <> '')
);

CREATE TABLE cars (
    id_car             BIGSERIAL PRIMARY KEY,
    id_client          BIGINT NOT NULL,
    make               VARCHAR(80) NOT NULL,
    model              VARCHAR(80) NOT NULL,
    vin                VARCHAR(17) NOT NULL,
    license_plate      VARCHAR(20) NOT NULL,
    year               INTEGER NOT NULL,
    mileage            INTEGER NOT NULL DEFAULT 0,
    CONSTRAINT fk_cars_client
        FOREIGN KEY (id_client)
        REFERENCES clients (id_client)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT uq_cars_vin UNIQUE (vin),
    CONSTRAINT uq_cars_license_plate UNIQUE (license_plate),
    CONSTRAINT chk_cars_year CHECK (year BETWEEN 1950 AND 2100),
    CONSTRAINT chk_cars_mileage CHECK (mileage >= 0)
);

CREATE TABLE services (
    id_service      BIGSERIAL PRIMARY KEY,
    service_name    VARCHAR(150) NOT NULL,
    description     VARCHAR(255),
    price           NUMERIC(12,2) NOT NULL,
    CONSTRAINT uq_services_name UNIQUE (service_name),
    CONSTRAINT chk_services_price CHECK (price >= 0)
);

CREATE TABLE parts (
    id_part          BIGSERIAL PRIMARY KEY,
    part_name        VARCHAR(150) NOT NULL,
    article          VARCHAR(50),
    unit             VARCHAR(20) NOT NULL,
    price            NUMERIC(12,2) NOT NULL,
    stock_quantity   INTEGER NOT NULL DEFAULT 0,
    CONSTRAINT uq_parts_article UNIQUE (article),
    CONSTRAINT chk_parts_price CHECK (price >= 0),
    CONSTRAINT chk_parts_stock CHECK (stock_quantity >= 0)
);

CREATE TABLE orders (
    id_order               BIGSERIAL PRIMARY KEY,
    id_client              BIGINT NOT NULL,
    id_car                 BIGINT NOT NULL,
    id_employee            BIGINT NOT NULL,
    order_date             DATE NOT NULL,
    problem_description    VARCHAR(500),
    status                 VARCHAR(30) NOT NULL DEFAULT 'new',
    total_cost             NUMERIC(12,2) NOT NULL DEFAULT 0,
    CONSTRAINT fk_orders_client
        FOREIGN KEY (id_client)
        REFERENCES clients (id_client)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT fk_orders_car
        FOREIGN KEY (id_car)
        REFERENCES cars (id_car)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT fk_orders_employee
        FOREIGN KEY (id_employee)
        REFERENCES employees (id_employee)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT chk_orders_total_cost CHECK (total_cost >= 0),
    CONSTRAINT chk_orders_status CHECK (
        status IN ('new', 'diagnosis', 'in_progress', 'completed', 'issued', 'cancelled')
    )
);

CREATE TABLE order_services (
    id_order_service   BIGSERIAL PRIMARY KEY,
    id_order           BIGINT NOT NULL,
    id_service         BIGINT NOT NULL,
    quantity           INTEGER NOT NULL DEFAULT 1,
    price              NUMERIC(12,2) NOT NULL,
    amount             NUMERIC(12,2) NOT NULL,
    CONSTRAINT fk_order_services_order
        FOREIGN KEY (id_order)
        REFERENCES orders (id_order)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_order_services_service
        FOREIGN KEY (id_service)
        REFERENCES services (id_service)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT uq_order_services UNIQUE (id_order, id_service),
    CONSTRAINT chk_order_services_quantity CHECK (quantity > 0),
    CONSTRAINT chk_order_services_price CHECK (price >= 0),
    CONSTRAINT chk_order_services_amount CHECK (amount >= 0)
);

CREATE TABLE order_parts (
    id_order_part      BIGSERIAL PRIMARY KEY,
    id_order           BIGINT NOT NULL,
    id_part            BIGINT NOT NULL,
    quantity           INTEGER NOT NULL DEFAULT 1,
    price              NUMERIC(12,2) NOT NULL,
    amount             NUMERIC(12,2) NOT NULL,
    CONSTRAINT fk_order_parts_order
        FOREIGN KEY (id_order)
        REFERENCES orders (id_order)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_order_parts_part
        FOREIGN KEY (id_part)
        REFERENCES parts (id_part)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    CONSTRAINT uq_order_parts UNIQUE (id_order, id_part),
    CONSTRAINT chk_order_parts_quantity CHECK (quantity > 0),
    CONSTRAINT chk_order_parts_price CHECK (price >= 0),
    CONSTRAINT chk_order_parts_amount CHECK (amount >= 0)
);

CREATE INDEX idx_users_id_role ON users (id_role);
CREATE INDEX idx_cars_id_client ON cars (id_client);
CREATE INDEX idx_orders_id_client ON orders (id_client);
CREATE INDEX idx_orders_id_car ON orders (id_car);
CREATE INDEX idx_orders_id_employee ON orders (id_employee);
CREATE INDEX idx_order_services_id_order ON order_services (id_order);
CREATE INDEX idx_order_services_id_service ON order_services (id_service);
CREATE INDEX idx_order_parts_id_order ON order_parts (id_order);
CREATE INDEX idx_order_parts_id_part ON order_parts (id_part);

COMMENT ON TABLE roles IS 'Роли пользователей системы';
COMMENT ON TABLE employees IS 'Сотрудники автосервиса';
COMMENT ON TABLE users IS 'Учетные записи пользователей';
COMMENT ON TABLE clients IS 'Клиенты автосервиса';
COMMENT ON TABLE cars IS 'Автомобили клиентов';
COMMENT ON TABLE services IS 'Справочник услуг';
COMMENT ON TABLE parts IS 'Справочник запчастей и материалов';
COMMENT ON TABLE orders IS 'Заказ-наряды';
COMMENT ON TABLE order_services IS 'Услуги, включенные в заказ-наряд';
COMMENT ON TABLE order_parts IS 'Запчасти, включенные в заказ-наряд';

INSERT INTO roles (role_name, description)
VALUES
    ('admin', 'Полный доступ к системе'),
    ('manager', 'Приемщик / менеджер заказов'),
    ('master', 'Исполнитель работ'),
    ('storekeeper', 'Кладовщик'),
    ('director', 'Просмотр отчетности');
