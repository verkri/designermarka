CREATE TABLE marka_category (id BIGSERIAL, name VARCHAR(255) NOT NULL UNIQUE, description VARCHAR(1000) NOT NULL, PRIMARY KEY(id));
CREATE TABLE marka_customer (id BIGSERIAL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, telephone VARCHAR(15) NOT NULL, country VARCHAR(100) NOT NULL, state VARCHAR(100), zipcode BIGINT, city VARCHAR(100) NOT NULL, address VARCHAR(255) NOT NULL, created_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE marka_order (id BIGSERIAL, pending BOOLEAN DEFAULT 'true' NOT NULL, shipped BOOLEAN DEFAULT 'false' NOT NULL, customer_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE marka_order_details (order_id BIGINT, product_id BIGINT, quantity BIGINT DEFAULT 1 NOT NULL, cadprice BIGINT NOT NULL, PRIMARY KEY(order_id, product_id));
CREATE TABLE marka_product (id BIGSERIAL, name VARCHAR(255) NOT NULL UNIQUE, category_id BIGINT NOT NULL, fabricated DATE, token VARCHAR(255) NOT NULL UNIQUE, stockqty BIGINT DEFAULT 1 NOT NULL, cadprice BIGINT NOT NULL, is_active BOOLEAN DEFAULT 'false' NOT NULL, description VARCHAR(3000), short VARCHAR(200), created_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
ALTER TABLE marka_order ADD CONSTRAINT marka_order_customer_id_marka_customer_id FOREIGN KEY (customer_id) REFERENCES marka_customer(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE marka_order_details ADD CONSTRAINT marka_order_details_product_id_marka_product_id FOREIGN KEY (product_id) REFERENCES marka_product(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE marka_order_details ADD CONSTRAINT marka_order_details_order_id_marka_order_id FOREIGN KEY (order_id) REFERENCES marka_order(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE marka_product ADD CONSTRAINT marka_product_category_id_marka_category_id FOREIGN KEY (category_id) REFERENCES marka_category(id) ON DELETE RESTRICT NOT DEFERRABLE INITIALLY IMMEDIATE;
