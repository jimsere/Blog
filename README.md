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
Εμφανίζει όλα τα άρθρα σε μορφή καρτών.

![Αρχική σελίδα](screenshots/home.png)


---

### 📝 Δημιουργία Νέου Άρθρου
Περιλαμβάνει editor, κατηγορία, εικόνα και preview.

![Νέα Ανάρτηση](screenshots/new-post.png)

---

### 👁️ Σελίδα Προβολής Post
Περιέχει τίτλο, ημερομηνία, εικόνα, περιγραφή και προβολές.

![Προβολή άρθρου](screenshots/post-view.png)

---

### 📬 Σελίδα Επικοινωνίας
Περιλαμβάνει info icons και πλήρως λειτουργική φόρμα επικοινωνίας με αποστολή email.

![Επικοινωνία](screenshots/contact.png)

---

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
