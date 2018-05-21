# primabase
## Fungsi

- Manajemen Pos, Logger, Pengamat
- Kesehatan Logger

## Data

- Pos `{nama, lonlat, desa, kec, kab, pengamat_id}`
- Logger `{sn}`
- SettingLogger`{logger_id, tinggisonar, tippingfactor, wlpressureoffset, wlpressurefactor, battcorrection}`
- User `{username, password, fullname}`
- Anomali `{sampling, pos_id, logger_id, data}`
- Periodic `{pos_id, logger_id, sampling, wlevel, rain, temperature, humidity, altitude, battery, signalquality}`
- Pengamat `{nama, alamat, desa, kec, kab, noktp}`
- Foto `{objtype, objid, taken, keterangan}`

## Use Case

- Login/logout, menu berbeda user group Tenant dan admin
- CRUD Logger
- CRUD Pos
- CRUD LoggerSetting
- View Periodic

## URLs

- `/login` Login, [GET, POST]
- `/logout` Logout, [GET]
- `/logger` List of Logger [GET], CRUD Logger di sini
  - `/add`  Nambah Logger [GET, POST]
  - `/<sn>` View Detil logger [GET]
    - `/edit` Edit logger [GET, POST]
    - `/del` Delete logger [GET, POST]
- `/pos` List of Pos [GET]
  - `/add`  Nambah Pos [GET, POST]
  - `/<sn>` View Detil Pos [GET]
    - `/edit` Edit Pos [GET, POST]
    - `/del` Delete Pos [GET, POST]
- `/pengamat` List of Pengamat [GET]
  - `/add`  Nambah Pengamat [GET, POST]
  - `/<sn>` View Detil Pengamat [GET]
    - `/edit` Edit Pengamat [GET, POST]
    - `/del` Delete Pengamat [GET, POST]
