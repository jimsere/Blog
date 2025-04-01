# 📝 MyLaravelBlog

Καλώς ήρθατε στο προσωπικό μου blog project!  
Πρόκειται για μια Laravel εφαρμογή όπου οι χρήστες μπορούν να δημιουργούν, επεξεργάζονται και διαβάζουν άρθρα blog με όμορφη παρουσίαση και δυναμική διαχείριση περιεχομένου. Όλα τα δεδομένα αποθηκεύονται σε μία βάση δεδομένων που εχω δημιουργήσει με την βοήθεια της PHP.

---

## 🔧 Τεχνολογίες

- Laravel 10
- Blade Templates
- Bootstrap 5
- TinyMCE Editor
- FontAwesome
- Purifier (για καθαρό HTML input)

---

## ✨ Βασικές Λειτουργίες

- ✅ Δημιουργία λογαριασμού (Register) και σύνδεση μέσω του κωδικού (Login)
- ✅ Ο κάθες χρήστης μπορεί να επεξεργαστεί μόνο τα δικά του blogs
- ✅ Για την προβολή και συγγραφή ενός blog απαιτείται σύνδεση
- ✅ Δημιουργία και επεξεργασία blog posts με WYSIWYG editor (TinyMCE)
- ✅ SEO-friendly URLs με slugs
- ✅ Κατηγοριοποίηση άρθρων
- ✅ Σύστημα αναζήτησης με λέξεις-κλειδιά και φίλτρο κατηγορίας
- ✅ Εμφάνιση προβολών ανά άρθρο αλλά και ημερομηνίας ανάρτησης.
- ✅ Responsive UI με όμορφα cards και layouts
- ✅ Σελίδα "Επικοινωνία" με φόρμα και email υποστήριξης

---

## 📸 Screenshots

### 🏠 Αρχική Σελίδα Blog

![Image](https://github.com/user-attachments/assets/e1494ae2-a02b-49db-9494-45c6c1241850)


---

### 📝 Δημιουργία Νέου Άρθρου

![Image](https://github.com/user-attachments/assets/52127cd0-6ca1-464c-8d7d-2ccf59842b05)

---

### 👁️ Σελίδα Προβολής Post

![Προβολή άρθρου](screenshots/post-view.png)

---
### 📬 Σύνδεση στον ιστότοπο

![Image](https://github.com/user-attachments/assets/050d145b-d1a3-4f6a-b0e9-9c7da0b4d40f)

---
### 📬 Σελίδα Επικοινωνίας

![Image](https://github.com/user-attachments/assets/8c759246-2543-472a-96ab-96881afd8458)
---
### 📬 Αρχική σε mobile version

![Image](https://github.com/user-attachments/assets/81ae1c6d-9088-4839-8508-bc836c78e305)---
## 🚀 Οδηγίες Εγκατάστασης (τοπικά)

```bash
git clone https://github.com/jimsere/MyLaravelBlog.git
cd MyLaravelBlog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 📬 Επικοινωνία
Για ερωτήσεις ή προτάσεις: 📧 info@dimitrisserefias@gmail.com
🌍 Θεσσαλονίκη, Ελλάδα

---

## 🖤 Ευχαριστώ!
Αν σου άρεσε το project, κάνε ένα ⭐ στο repo!
