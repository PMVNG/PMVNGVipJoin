# PMVNGVipJoin
Khi người chơi sở hữu VIP trên máy chủ sẽ được thông báo đặc biệt khi tham gia máy chủ!

## Tính năng
- Cấu hình dễ dàng
- Sự thông báo

## Cấu hình
```yaml
---
# rank : cấp bậc

# Nhập tên của rank được nhận thông báo thông báo đặc biệt khi tham gia máy chủ như định dạng hiện tại bên dưới.
ranks:
  - Owner
  - Admin

# Thông báo gửi tới người chơi có các rank được liệt ở ở ranks: []
# {name} : Tên của người chơi
# {rank} : Rank của người chơi
message: "Welcome [{rank}] {name} to the server!"

# Loại thông báo
# allPlayers : Gửi thông báo chào mừng người chơi vip đến toán bộ người chơi trong máy chủ
# onlyVip : Chỉ gửi thông báo chào mừng đến người chơi sở hữu rank vip
messageType: allPlayers
...

```
