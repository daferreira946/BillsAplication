create table billscontroller.bills
(
    id bigint unsigned auto_increment
        primary key,
    date date not null,
    type blob not null,
    description mediumtext null,
    value double not null,
    created_at timestamp null,
    updated_at timestamp null
);