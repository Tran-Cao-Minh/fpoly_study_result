// CHUC NANG KIEM TRA CHECK BOX - .SELECT-BAR
// lay mang check box the loai va muc gia
let category_checkbox_list = document.querySelectorAll("#category-list .select-item input");
let price_range_checkbox_list = document.querySelectorAll("#price-range-list .select-item input");
// them su kien click vao cac check box the loai
// phan tu mang so 0 la lua chon tat ca
category_checkbox_list[0].addEventListener("click", function () {
  // tao vong lap de bo chon cac phan tu khong phai tat ca
  for (let i = 1; i < category_checkbox_list.length; i++) {
    if (category_checkbox_list[i].checked == true) {
      category_checkbox_list[i].click(); // true click thanh false
    }
  }
  if (category_checkbox_list[0].checked == false) {
    category_checkbox_list[0].checked = true; // tranh nguoi dung bo chon tat ca
  }
});
for (let i = 1; i < category_checkbox_list.length; i++) {
  category_checkbox_list[i].addEventListener("click", function () {
    let countCheck = 0;
    for (let i = 1; i < category_checkbox_list.length; i++) {
      if (category_checkbox_list[i].checked == true) {
        countCheck++;
      }
    }
    // neu chon tat ca the loai thi chuyen qua o tat ca
    // neu khong chon the loai nao thi cung chuyen qua o tat ca
    if (countCheck == 0 || countCheck == category_checkbox_list.length - 1) {
      category_checkbox_list[0].click();
    } else {
      // neu co chon thi bo chon checkbox tat ca
      category_checkbox_list[0].checked = false;
      category_checkbox_list[0].disabled = false; // cho phep nguoi dung chon o tat ca
    }
  });
}
// them su kien click vao cac check box muc gia
// phan tu mang so 0 la lua chon tat ca
price_range_checkbox_list[0].addEventListener("click", function () {
  // tao vong lap de bo chon cac phan tu khong phai tat ca
  for (let i = 1; i < price_range_checkbox_list.length; i++) {
    if (price_range_checkbox_list[i].checked == true) {
      price_range_checkbox_list[i].click(); // true click thanh false
    }
  }
  if (price_range_checkbox_list[0].checked == false) {
    price_range_checkbox_list[0].checked = true; // tranh nguoi dung bo chon tat ca
  }
});
for (let i = 1; i < price_range_checkbox_list.length; i++) {
  price_range_checkbox_list[i].addEventListener("click", function () {
    let countCheck = 0;
    for (let i = 1; i < price_range_checkbox_list.length; i++) {
      if (price_range_checkbox_list[i].checked == true) {
        countCheck++;
      }
    }
    // neu chon tat ca the loai thi chuyen qua o tat ca
    // neu khong chon the loai nao thi cung chuyen qua o tat ca
    if (countCheck == 0 || countCheck == price_range_checkbox_list.length - 1) {
      price_range_checkbox_list[0].click();
    } else {
      // neu co chon thi bo chon checkbox tat ca
      price_range_checkbox_list[0].checked = false;
      price_range_checkbox_list[0].disabled = false; // cho phep nguoi dung chon o tat ca
    }
  });
}
// END CHUC NANG KIEM TRA CHECK BOX - .SELECT-BAR

// CHUC NANG DANH SACH LUA CHON SAP XEP - .FILTER-SORT
// an hien danh sach lua chon thong qua click
document.querySelector(".filter-sort").addEventListener("click", function () {
  let filterSortList = document.querySelector(".filter-sort-list");
  if (filterSortList.style.display == "none") {
    filterSortList.style.display = "block";
  } else {
    filterSortList.style.display = "none";
  }
});
// lay mang cac phan tu de chon loai sap xep
let sortArr = document.querySelectorAll(".filter-sort-list li");
for (let i = 0; i < sortArr.length; i++) {
  // khi click vao phan tu thi se thay doi .filter-sort-choosen theo cai duoc chon
  sortArr[i].addEventListener("click", function () {
    let filterSortChoosen = document.querySelector(".filter-sort-choosen");
    filterSortChoosen.innerText = sortArr[i].innerText;
    filterSortChoosen.setAttribute("value", sortArr[i].getAttribute("value"));
    document.querySelector(".filter-sort").click(); // an danh sach sau khi chon xong
  });
}
// END CHUC NANG DANH SACH LUA CHON SAP XEP - .FILTER-SORT

// CHUC NANG THEM XOA TAG LOC THEO: - .FILTER-TAG-LIST
// da lay mang cac check box tai dong 3,4
// them su kien cho tat ca checkbox the loai
for (let i = 1; i < category_checkbox_list.length; i++) {
  // khi click vao checkbox se them hoac xoa tag tuong ung
  category_checkbox_list[i].addEventListener("click", function () {
    // lay tieu de cua cac check box
    let innerText =
      category_checkbox_list[i].parentElement.querySelector("label").innerText;
    // them tag tuong ung khi checkbox duoc check
    if (category_checkbox_list[i].checked == true) {
      let newTag = document.createElement("span");
      newTag.classList.add("filter-by");
      newTag.innerHTML = innerText + '<i class="fas fa-times-circle"></i>';
      // khi click vao tag se xoa tag dong thoi bo chon checkbox
      newTag.addEventListener("click", function () {
        document.querySelector(".filter-tag-list").removeChild(this);
        category_checkbox_list[i].click(); // click de bo check
      });
      document.querySelector(".filter-tag-list").appendChild(newTag);
    }
    // xoa tag tuong ung khi checkbox da bi bo check
    else if (category_checkbox_list[i].checked == false) {
      // lay mang tag hien tai
      let tagArr = document.querySelectorAll(".filter-tag-list .filter-by");
      // xoa qua vong lap
      for (let y = 0; y < tagArr.length; y++) {
        if (innerText == tagArr[y].innerText) {
          document.querySelector(".filter-tag-list").removeChild(tagArr[y]);
          break; // thoat vong lap khi da hoan thanh
        }
      }
    }
    // an hien dong chu tat ca
    // lay mang tag hien tai
    let tagArr = document.querySelectorAll(".filter-tag-list .filter-by");
    // neu khong co tag nao thi hien dong chu tat ca
    if (tagArr.length == 0) {
      document.querySelector(".filter-tag-list .filter-by-all").style.display =
        "block";
    }
    // neu co tag thi an dong chu tat ca
    else if (tagArr.length > 0) {
      document.querySelector(".filter-tag-list .filter-by-all").style.display =
        "none";
    }
  });
}
// them su kien cho tat ca checkbox muc gia
for (let i = 1; i < price_range_checkbox_list.length; i++) {
  // khi click vao checkbox se them hoac xoa tag tuong ung
  price_range_checkbox_list[i].addEventListener("click", function () {
    let innerText =
      price_range_checkbox_list[i].parentElement.querySelector("label").innerText;
    // them tag tuong ung khi checkbox duoc check
    if (price_range_checkbox_list[i].checked == true) {
      let newTag = document.createElement("span");
      newTag.classList.add("filter-by");
      newTag.innerHTML = innerText + '<i class="fas fa-times-circle"></i>';
      // khi click vao tag se xoa tag dong thoi bo chon checkbox
      newTag.addEventListener("click", function () {
        document.querySelector(".filter-tag-list").removeChild(this);
        price_range_checkbox_list[i].click(); // click de bo check
      });
      document.querySelector(".filter-tag-list").appendChild(newTag);
    }
    // xoa tag tuong ung khi checkbox da bi bo check
    else if (price_range_checkbox_list[i].checked == false) {
      // lay mang tag hien tai
      let tagArr = document.querySelectorAll(".filter-tag-list .filter-by");
      // xoa qua vong lap
      for (let y = 0; y < tagArr.length; y++) {
        if (innerText == tagArr[y].innerText) {
          document.querySelector(".filter-tag-list").removeChild(tagArr[y]);
          break; // thoat vong lap khi da hoan thanh
        }
      }
    }
    // an hien dong chu tat ca
    // lay mang tag hien tai
    let tagArr = document.querySelectorAll(".filter-tag-list .filter-by");
    // neu khong co tag nao thi hien dong chu tat ca
    if (tagArr.length == 0) {
      document.querySelector(".filter-tag-list .filter-by-all").style.display =
        "block";
    }
    // neu co tag thi an dong chu tat ca
    else if (tagArr.length > 0) {
      document.querySelector(".filter-tag-list .filter-by-all").style.display =
        "none";
    }
  });
}
// tiep tuc neu chon tat ca ~
// END CHUC NANG THEM XOA TAG LOC THEO: - .FILTER-TAG-LIST

// CHUC NANG DONG MO SIDE-BAR KHI MAN HINH <= 1024PX - ASIDE
document.querySelector(".close-aside").addEventListener("click", function () {
  document.querySelector("aside").style.display = "none";
});
document.querySelector(".aside-cover").addEventListener("click", function () {
  document.querySelector("aside").style.display = "none";
});
document.querySelector(".filter-btn").addEventListener("click", function () {
  document.querySelector("aside").style.display = "block";
});
// END CHUC NANG DONG MO SIDE-BAR KHI MAN HINH <= 1024PX - ASIDE