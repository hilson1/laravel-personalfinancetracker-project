<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .category-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            margin-right: 10px;
        }
        .action-btn {
            width: 32px;
            height: 32px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 2px;
        }
        .icon-preview {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin: 10px auto;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h2>Manage categories</h2>
                <div class="btn-group">
                    <button class="btn btn-secondary" onclick="mergeCategories()">Merge categories</button>
                    <button class="btn btn-secondary" onclick="deleteCategories()">Delete categories</button>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title mb-0">Income categories</h3>
            </div>
            <div class="card-body" id="incomeCategories">
                <!-- Income categories will be inserted here -->
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Expense categories</h3>
            </div>
            <div class="card-body" id="expenseCategories">
                <!-- Expense categories will be inserted here -->
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="icon-preview" id="iconPreview">
                        <i class="bi"></i>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon</label>
                        <select class="form-select" id="categoryIcon">
                            <option value="bi-info-circle">Information</option>
                            <option value="bi-cash-stack">Cash Stack</option>
                            <option value="bi-gift">Gift</option>
                            <option value="bi-shield">Shield</option>
                            <option value="bi-bank">Bank</option>
                            <option value="bi-box">Box</option>
                            <option value="bi-people">People</option>
                            <option value="bi-cash">Cash</option>
                            <option value="bi-file-text">File Text</option>
                            <option value="bi-currency-dollar">Currency</option>
                            <option value="bi-person">Person</option>
                            <option value="bi-controller">Controller</option>
                            <option value="bi-book">Book</option>
                            <option value="bi-cup-hot">Cup</option>
                            <option value="bi-cart">Cart</option>
                            <option value="bi-heart-pulse">Healthcare</option>
                            <option value="bi-house">House</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="color" class="form-control" id="categoryColor">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveCategory()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Your JavaScript code goes here
                    const incomeCategories = [
                { id: 1, name: 'Business', icon: 'bi-info-circle', color: '#ffa500', transactions: 0 },
                { id: 2, name: 'Extra Income', icon: 'bi-cash-stack', color: '#4CAF50', transactions: 0 },
                { id: 3, name: 'Gifts', icon: 'bi-gift', color: '#00c853', transactions: 0 },
                { id: 4, name: 'Insurance Payout', icon: 'bi-shield', color: '#2196F3', transactions: 0 },
                { id: 5, name: 'Loan', icon: 'bi-bank', color: '#e91e63', transactions: 0 },
                { id: 6, name: 'Other', icon: 'bi-box', color: '#757575', transactions: 0 },
                { id: 7, name: 'Parental Leave', icon: 'bi-people', color: '#ff4081', transactions: 0 },
                { id: 8, name: 'Salary', icon: 'bi-cash', color: '#00c853', transactions: 0 }
            ];

            const expenseCategories = [
                { id: 101, name: 'Bills', icon: 'bi-file-text', color: '#f44336', transactions: 0 },
                { id: 102, name: 'Fee', icon: 'bi-currency-dollar', color: '#9c27b0', transactions: 0 },
                { id: 103, name: 'Personal', icon: 'bi-person', color: '#673ab7', transactions: 0 },
                { id: 104, name: 'Entertainment', icon: 'bi-controller', color: '#3f51b5', transactions: 0 },
                { id: 105, name: 'Education', icon: 'bi-book', color: '#2196f3', transactions: 0 },
                { id: 106, name: 'Food and Drinks', icon: 'bi-cup-hot', color: '#ff9800', transactions: 0 },
                { id: 107, name: 'Gifts', icon: 'bi-gift', color: '#e91e63', transactions: 0 },
                { id: 108, name: 'Groceries', icon: 'bi-cart', color: '#4caf50', transactions: 0 },
                { id: 109, name: 'Healthcare', icon: 'bi-heart-pulse', color: '#00bcd4', transactions: 0 },
                { id: 110, name: 'Home', icon: 'bi-house', color: '#795548', transactions: 0 }
            ];

            let editingCategoryId = null;
            let deletingCategoryId = null;
            let editModal = null;
            let deleteModal = null;

            function renderCategories(categories, containerId) {
                const container = document.getElementById(containerId);
                container.innerHTML = categories.map(category => `
                    <div class="d-flex align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="${category.id}">
                        </div>
                        <div class="category-icon" style="background-color: ${category.color}">
                            <i class="bi ${category.icon}"></i>
                        </div>
                        <div class="flex-grow-1">
                            <span class="fw-medium">${category.name}</span>
                            <br>
                            <small class="text-muted">${category.transactions} transactions</small>
                        </div>
                        <div>
                            <button class="btn btn-light action-btn" onclick="editCategory(${category.id})">
                                <i class="bi bi-gear text-success"></i>
                            </button>
                            <button class="btn btn-light action-btn" onclick="deleteCategory(${category.id})">
                                <i class="bi bi-trash text-danger"></i>
                            </button>
                        </div>
                    </div>
                `).join('');
            }

            function mergeCategories() {
                const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                if (selectedCheckboxes.length < 2) {
                    alert('Please select at least 2 categories to merge');
                    return;
                }

                const selectedIds = Array.from(selectedCheckboxes).map(cb => parseInt(cb.value));
                const allCategories = [...incomeCategories, ...expenseCategories];
                const selectedCategories = selectedIds.map(id => allCategories.find(c => c.id === id));

                // Group categories by name
                const categoriesByName = {};
                selectedCategories.forEach(category => {
                    if (!categoriesByName[category.name]) {
                        categoriesByName[category.name] = [];
                    }
                    categoriesByName[category.name].push(category);
                });

                // Merge categories with the same name
                Object.values(categoriesByName).forEach(categories => {
                    if (categories.length > 1) {
                        // Keep the first category and merge transactions
                        const targetCategory = categories[0];
                        const categoriesToMerge = categories.slice(1);

                        // Sum up transactions
                        targetCategory.transactions = categories.reduce((sum, cat) => sum + cat.transactions, 0);

                        // Remove merged categories
                        categoriesToMerge.forEach(category => {
                            if (category.id < 100) {
                                const index = incomeCategories.findIndex(c => c.id === category.id);
                                if (index !== -1) incomeCategories.splice(index, 1);
                            } else {
                                const index = expenseCategories.findIndex(c => c.id === category.id);
                                if (index !== -1) expenseCategories.splice(index, 1);
                            }
                        });
                    }
                });

                renderCategories(incomeCategories, 'incomeCategories');
                renderCategories(expenseCategories, 'expenseCategories');
            }

            function deleteCategories() {
                const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                if (selectedCheckboxes.length === 0) {
                    alert('Please select at least one category to delete');
                    return;
                }

                if (confirm('Are you sure you want to delete the selected categories?')) {
                    const selectedIds = Array.from(selectedCheckboxes).map(cb => parseInt(cb.value));
                    
                    // Remove selected categories from both arrays
                    selectedIds.forEach(id => {
                        if (id < 100) {
                            const index = incomeCategories.findIndex(c => c.id === id);
                            if (index !== -1) incomeCategories.splice(index, 1);
                        } else {
                            const index = expenseCategories.findIndex(c => c.id === id);
                            if (index !== -1) expenseCategories.splice(index, 1);
                        }
                    });

                    renderCategories(incomeCategories, 'incomeCategories');
                    renderCategories(expenseCategories, 'expenseCategories');
                }
            }

            function editCategory(id) {
                editingCategoryId = id;
                const category = [...incomeCategories, ...expenseCategories].find(c => c.id === id);
                if (!category) return;

                document.getElementById('categoryName').value = category.name;
                document.getElementById('categoryIcon').value = category.icon;
                document.getElementById('categoryColor').value = category.color;
                
                updateIconPreview(category.icon, category.color);
                editModal.show();
            }

            function updateIconPreview(icon, color) {
                const preview = document.getElementById('iconPreview');
                preview.style.backgroundColor = color;
                preview.querySelector('i').className = `bi ${icon}`;
            }

            function saveCategory() {
                if (!editingCategoryId) return;

                const name = document.getElementById('categoryName').value;
                const icon = document.getElementById('categoryIcon').value;
                const color = document.getElementById('categoryColor').value;

                const isIncome = editingCategoryId < 100;
                const categories = isIncome ? incomeCategories : expenseCategories;
                const categoryIndex = categories.findIndex(c => c.id === editingCategoryId);

                if (categoryIndex !== -1) {
                    categories[categoryIndex] = {
                        ...categories[categoryIndex],
                        name,
                        icon,
                        color
                    };
                    renderCategories(incomeCategories, 'incomeCategories');
                    renderCategories(expenseCategories, 'expenseCategories');
                }

                editModal.hide();
                editingCategoryId = null;
            }

            function deleteCategory(id) {
                deletingCategoryId = id;
                deleteModal.show();
            }

            function confirmDelete() {
                if (!deletingCategoryId) return;

                const isIncome = deletingCategoryId < 100;
                const categories = isIncome ? incomeCategories : expenseCategories;
                const categoryIndex = categories.findIndex(c => c.id === deletingCategoryId);

                if (categoryIndex !== -1) {
                    categories.splice(categoryIndex, 1);
                    renderCategories(incomeCategories, 'incomeCategories');
                    renderCategories(expenseCategories, 'expenseCategories');
                }

                deleteModal.hide();
                deletingCategoryId = null;
            }

            // Initialize the page
            document.addEventListener('DOMContentLoaded', () => {
                editModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
                deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));

                // Set up event listeners for icon and color changes
                document.getElementById('categoryIcon').addEventListener('change', (e) => {
                    const color = document.getElementById('categoryColor').value;
                    updateIconPreview(e.target.value, color);
                });

                document.getElementById('categoryColor').addEventListener('input', (e) => {
                    const icon = document.getElementById('categoryIcon').value;
                    updateIconPreview(icon, e.target.value);
                });

                renderCategories(incomeCategories, 'incomeCategories');
                renderCategories(expenseCategories, 'expenseCategories');
            });
    </script>
</body>
</html>