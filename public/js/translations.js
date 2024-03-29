const translate = (word) => {

    let locale = document.querySelector('html').getAttribute('lang') || 'ar';
    if( locale === 'ar' )
        return translations[locale][word] ?? word;
    else
        return word;
}

let translations = {
    'ar': {
        "Please wait..." : "يرجى الانتظار...",
        "Are you sure from deleting this " : "هل انت متاكد من حذف  ",
        "Yes, Delete !" : "نعــم, أحذف !",
        "No, Cancel" : "لا , ألغي",
        "something went wrong" : "حدث خطأ ما",
        "Error !" : "خطـأ !",
        "Operation done successfully" : "تمت العملية بنجاح",
        "This action is unauthorized." : "ليس لديك صلاحية لهذا الاجراء",
        "Loading..." : "تحميل...",
        "Actions" : "الإجراءات",
        "Edit" : "تعديل",
        "Show" : "التفاصيل",
        "admin" : "الموظف",
        "Delete" : "حذف",
        "Are you sure you want to delete this" : "هل أنت متأكد من حذف هذا ",
        "?" : "؟",
        "No data available in table" : "لا يوجد بيانات",
        "deleting now ..." : "يتم الحذف الأن ...",
        "All data related to this" : "جميع البيانات المرتبطة بهذه",
        "will be deleted" : "سوف يتم حذفها",
        "Restore" : "استرجاع",
        "You have restored the" : "تم استرجاع",
        "No results found" : "لا يوجد نتائج للعرض",
        "You have deleted this item successfully !" : "تم حذف هذا العنصر بنجاح !",
        "was not deleted !" : "لم يتم الحذف !",
        "Showing" : "عرض",
        "to" : "من",
        "records" : "صفوف",
        "of" : "إجمالي",
        "Showing no records" : "عدد الصفوف المعروضة",
        "Yes" : "نعم",
        "No" : "لا",
        "Processing..." : "جاري التحميل...",
        "item" : "العنصر",
        "url" : "الرابط",
        "LE" : "جنيهاٌ",
        "kilometer" : "الكيلومتر",
        "hour" : "الساعة",
        "day" : "اليوم",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : ""
    }
};


