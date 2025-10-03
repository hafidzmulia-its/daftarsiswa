# Visual Code Flow

## Application Flow Diagram

```
┌─────────────────────────────────────────────────────────────┐
│                       index.php (Main Page)                  │
│                                                              │
│  ┌──────────────────────────────────────────────────────┐   │
│  │  Read: Display all students from database            │   │
│  │  - Query: SELECT * FROM siswa ORDER BY id DESC      │   │
│  │  - Shows: Table with student data                   │   │
│  └──────────────────────────────────────────────────────┘   │
│                                                              │
│  Actions available:                                          │
│  ┌──────────┐  ┌──────────┐  ┌──────────┐                  │
│  │  CREATE  │  │  UPDATE  │  │  DELETE  │                  │
│  │    ↓     │  │    ↓     │  │    ↓     │                  │
│  │ tambah   │  │  ubah    │  │  hapus   │                  │
│  └──────────┘  └──────────┘  └──────────┘                  │
└─────────────────────────────────────────────────────────────┘
         │              │              │
         ↓              ↓              ↓
┌────────────────┐ ┌────────────────┐ ┌────────────────┐
│  tambah.php    │ │   ubah.php     │ │   hapus.php    │
│  (CREATE)      │ │   (UPDATE)     │ │   (DELETE)     │
│                │ │                │ │                │
│ • Show form    │ │ • Get ID       │ │ • Get ID       │
│ • Validate     │ │ • Fetch data   │ │ • Execute      │
│ • Insert data  │ │ • Show form    │ │   DELETE       │
│ • Redirect     │ │ • Update data  │ │ • Redirect     │
└────────────────┘ └────────────────┘ └────────────────┘
         │              │              │
         └──────────────┴──────────────┘
                     │
                     ↓
         ┌────────────────────────┐
         │   Back to index.php    │
         │   with success message │
         └────────────────────────┘
```

## Database Connection Flow

```
┌─────────────────┐
│   config.php    │
│                 │
│ • Server: localhost
│ • User: root
│ • DB: daftarsiswa
│                 │
│ mysqli_connect()│
└────────┬────────┘
         │
         ↓
┌─────────────────┐
│  $conn object   │ ← Used in all PHP files
└─────────────────┘
```

## File Dependencies

```
index.php ──┬──> config.php (DB connection)
            └──> style.css (Styling)

tambah.php ─┬──> config.php (DB connection)
            └──> style.css (Styling)

ubah.php ───┬──> config.php (DB connection)
            └──> style.css (Styling)

hapus.php ──┴──> config.php (DB connection)
```

## CRUD Operations Detail

### CREATE (tambah.php)
```php
POST Request → Sanitize Input → INSERT INTO siswa → Redirect
    ↓              ↓                    ↓               ↓
User fills    Prevent SQL         Add to DB      Success message
  form        injection                          on index.php
```

### READ (index.php)
```php
Page Load → SELECT Query → Fetch Results → Display Table
    ↓            ↓               ↓              ↓
  Visit      Get all         Loop rows      Show in HTML
  page       students                       with styling
```

### UPDATE (ubah.php)
```php
Get ID → SELECT Data → Show Form → POST → UPDATE → Redirect
  ↓         ↓            ↓          ↓       ↓         ↓
From     Fetch        Pre-fill   Submit  Update    Success
URL      existing     values     data    record    message
```

### DELETE (hapus.php)
```php
Get ID → Confirm → DELETE FROM siswa → Redirect
  ↓        ↓            ↓                 ↓
From    JavaScript   Remove record    Success message
URL     dialog                        on index.php
```

## Security Layers

```
User Input
    ↓
┌─────────────────────────────────────┐
│ mysqli_real_escape_string()         │ ← Prevent SQL Injection
└─────────────────────────────────────┘
    ↓
Database
    ↓
Output
    ↓
┌─────────────────────────────────────┐
│ htmlspecialchars()                  │ ← Prevent XSS
└─────────────────────────────────────┘
    ↓
Browser Display
```

## User Experience Flow

```
1. User visits index.php
   └─> Sees list of students

2. User clicks "Tambah Siswa Baru"
   └─> Goes to tambah.php
       └─> Fills form
           └─> Submits
               └─> Back to index.php with success message

3. User clicks "Edit" button
   └─> Goes to ubah.php with ID
       └─> Form pre-filled with data
           └─> Modifies data
               └─> Submits
                   └─> Back to index.php with update message

4. User clicks "Hapus" button
   └─> JavaScript confirmation
       └─> If confirmed: goes to hapus.php
           └─> Delete executed
               └─> Back to index.php with delete message
```

## Styling Architecture

```
style.css
├── Reset & Base Styles
├── Container & Layout
├── Header Styles
├── Alert Messages (Success/Error)
├── Button Styles (Primary/Secondary/Edit/Delete)
├── Table Styles (Responsive)
├── Form Styles (Input/Select/Label)
└── Media Queries (Mobile Responsive)
```

## Key Features Matrix

| Feature          | File         | Method | Security      |
|-----------------|--------------|--------|---------------|
| View Students   | index.php    | GET    | XSS Protected |
| Add Student     | tambah.php   | POST   | SQL Protected |
| Edit Student    | ubah.php     | POST   | Both          |
| Delete Student  | hapus.php    | GET    | Confirmation  |
| Database Setup  | database.sql | -      | Constraints   |
| Styling         | style.css    | -      | -             |
| Configuration   | config.php   | -      | Credentials   |

---
This visualization helps understand the complete flow and architecture of the CRUD application.
