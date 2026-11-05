# MIG AgroMet – Agricultural Precipitation Monitoring Platform

## Overview

**MIG AgroMet** is a web-based agricultural data management platform developed for **MIDROC Investment Group (MIG)** to facilitate the recording, management and monitoring of precipitation data across its agricultural farm sites in Ethiopia.

The platform provides a centralised system for collecting and organising precipitation records from different farms and locations across the country. It enables authorised users to record precipitation measurements, associate them with specific farm sites and dates, and maintain historical records for agricultural monitoring and operational reference.

By digitising precipitation data collection, MIG AgroMet helps improve data accessibility, record management and the monitoring of weather conditions across the group's agricultural operations.

## Key Features

- **Farm-specific records:** Organises precipitation data according to individual farms and agricultural sites.
- **Precipitation recording:** Allows authorised users to enter precipitation measurements, recording dates and additional information.
- **Data management:** Supports adding new records and updating existing records.
- **User authentication:** Provides a login system for authorised users.
- **Administrative management:** Includes administrative functionality for managing platform users.
- **Centralised database:** Stores precipitation records in a MySQL database for structured data management.
- **Telegram notification component:** Includes a notification script for Telegram integration.

## Technology Stack

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS and JavaScript
- **Framework / UI:** Bootstrap
- **Additional tools:** Telegram Bot integration

## Project Structure

The repository contains the following main components:

- `farms/` – Farm-specific pages and site information.
- `php/` – Database connection and supporting PHP functionality.
- `layout/` – Website stylesheets and scripts.
- `images/` – Website images and visual assets.
- `migagrometer.sql` – Database structure and related SQL data.
- `admin.php` – Administrative interface.
- `insert-data.php` – Precipitation data entry and updating functionality.
- `register_user.php` – User registration functionality.

## Purpose and Impact

The platform was developed to support the digital management of agricultural precipitation records across MIDROC Investment Group's farm operations in Ethiopia. By providing a structured approach to collecting and managing site-specific precipitation data, it supports more organised agricultural monitoring and provides a foundation for data-informed operational decisions.

---

**Developed by:** Surafel A. Tadesse

**Organisation:** MIDROC Investment Group
