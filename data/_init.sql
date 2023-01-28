  use ebewmyqz_ajtebapp;

  CREATE TABLE customers (
    customer_id VARCHAR(11) NOT NULL PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(16),
    country VARCHAR(30),
    city VARCHAR(30),
    address_line1 VARCHAR(200),
    /*TOP MEASUREMENT*/
    agbada_length VARCHAR(10),
    agbada_width VARCHAR(10),
    agbada_head VARCHAR(10),
    top_neck VARCHAR(10),
    top_sh VARCHAR(10),
    top_al1 VARCHAR(10),
    top_al2 VARCHAR(10),
    top_bl1 VARCHAR(10),
    top_bl2 VARCHAR(10),
    top_bl3 VARCHAR(10),
    top_burst1 VARCHAR(10),
    top_burst2 VARCHAR(10),
    top_burst3 VARCHAR(10),
    top_ra1 VARCHAR(10),
    top_ra2 VARCHAR(10),
    top_ra3 VARCHAR(10),
    top_cuffs VARCHAR(10),
    top_alunder VARCHAR(10),
    top_burstburst VARCHAR(10),
    top_wrist VARCHAR(10),
    top_armhole VARCHAR(10),
    top_sidejoining VARCHAR(10),
    /*PANT MEASUREMENT*/
    pant_waist VARCHAR(10),
    pant_lap VARCHAR(10),
    pant_tl VARCHAR(10),
    pant_knee VARCHAR(10),
    pant_ankle VARCHAR(10),
    pant_hips VARCHAR(10),
    pant_wk VARCHAR(10),
    pant_frontcrotch VARCHAR(10),
    pant_backcrotch VARCHAR(10),
    pant_inseam VARCHAR(10),
    calve VARCHAR(10),
    date TIMESTAMP
  );

  CREATE TABLE orders (
    order_id VARCHAR(10) NOT NULL PRIMARY KEY,
    customer VARCHAR(11) NOT NULL,
    sleeve VARCHAR(20),
    neck VARCHAR(20),
    embroy VARCHAR(20),
    underlay VARCHAR(10),
    pant VARCHAR(10),
    back_detailing TINYINT(1),
    back_pocket TINYINT(1),
    chest_pocket TINYINT(1),
    side_pocket VARCHAR(10),
    bl VARCHAR(10),
    color_dislike VARCHAR(50),
    design VARCHAR(50),
        /*I know this idea is terrible and
        violates certain design principles, however, that's
        the only way I can fulfill the constraints of 
        keeping previous measurements used by a customer at the moment*/
    /*TOP MEASUREMENT*/
    agbada_length VARCHAR(10),
    agbada_width VARCHAR(10),
    agbada_head VARCHAR(10),
    top_neck VARCHAR(10),
    top_sh VARCHAR(10),
    top_al1 VARCHAR(10),
    top_al2 VARCHAR(10),
    top_bl1 VARCHAR(10),
    top_bl2 VARCHAR(10),
    top_bl3 VARCHAR(10),
    top_burst1 VARCHAR(10),
    top_burst2 VARCHAR(10),
    top_burst3 VARCHAR(10),
    top_ra1 VARCHAR(10),
    top_ra2 VARCHAR(10),
    top_ra3 VARCHAR(10),
    top_cuffs VARCHAR(10),
    top_alunder VARCHAR(10),
    top_burstburst VARCHAR(10),
    top_wrist VARCHAR(10),
    top_armhole VARCHAR(10),
    top_sidejoining VARCHAR(10),
    /*PANT MEASUREMENT*/
    pant_waist VARCHAR(10),
    pant_lap VARCHAR(10),
    pant_tl VARCHAR(10),
    pant_knee VARCHAR(10),
    pant_ankle VARCHAR(10),
    pant_hips VARCHAR(10),
    pant_wk VARCHAR(10),
    pant_frontcrotch VARCHAR(10),
    pant_backcrotch VARCHAR(10),
    pant_inseam VARCHAR(10),
    calve VARCHAR(10),
    order_date TIMESTAMP,
    FOREIGN KEY (customer) 
      REFERENCES customers(customer_id)
      ON DELETE CASCADE
  );

  CREATE TABLE invoices (
    invoice_id VARCHAR(16) NOT NULL PRIMARY KEY,
    customer VARCHAR(11) NOT NULL,
    descriptions VARCHAR(250),
    owners VARCHAR(200),
    quantities VARCHAR(200),
    prices VARCHAR(200),
    amount FLOAT(12),
    bbf FLOAT(10),
    deposit FLOAT(8),
    discount FLOAT(8),
    shipping FLOAT(8),
    old_balance FLOAT(8),
    vat VARCHAR(5),
    mode_of_payment VARCHAR(50),
    paid TINYINT(1),
    issued_date TIMESTAMP
  );

  CREATE TABLE users(
    username VARCHAR(100),
    verified VARCHAR(1),
    token VARCHAR(100),
    passw VARCHAR(255)
  );
